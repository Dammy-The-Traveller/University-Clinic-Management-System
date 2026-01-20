// var options = {
//   chart: {
//     height: 150,
//     type: "bar",
//     toolbar: {
//       show: false,
//     },
//   },
//   plotOptions: {
//     bar: {
//       columnWidth: "70%",
//       borderRadius: 2,
//       distributed: true,
//       dataLabels: {
//         position: "center",
//       },
//     },
//   },
//   series: [
//     {
//       name: "Patients",
//       data: [5, 7, 3, 6, 8, 9, 4],
//     },
//   ],
//   legend: {
//     show: false,
//   },
//   xaxis: {
//     categories: [
//       "S",
//       "M",
//       "T",
//       "W",
//       "T",
//       "F",
//       "S",
//     ],
//     axisBorder: {
//       show: false,
//     },
//     labels: {
//       show: true,
//     },
//   },
//   yaxis: {
//     show: false,
//   },
//   grid: {
//     borderColor: "#d8dee6",
//     strokeDashArray: 5,
//     xaxis: {
//       lines: {
//         show: true,
//       },
//     },
//     yaxis: {
//       lines: {
//         show: false,
//       },
//     },
//     padding: {
//       top: 0,
//       right: 0,
//       bottom: 0,
//       left: 0,
//     },
//   },
//   tooltip: {
//     y: {
//       formatter: function (val) {
//         return val;
//       },
//     },
//   },
//   colors: [
//     "rgba(255, 255, 255, 0.7)", "rgba(255, 255, 255, 0.6)", "rgba(255, 255, 255, 0.5)", "rgba(255, 255, 255, 0.4)", "rgba(255, 255, 255, 0.3)", "rgba(255, 255, 255, 0.2)", "rgba(255, 255, 255, 0.2)"
//   ],
// };
// var chart = new ApexCharts(document.querySelector("#dacActivity"), options);
// chart.render();

document.addEventListener("DOMContentLoaded", function () {
  fetchPatientData(); // Initial fetch
 // setInterval(fetchPatientData, 24 * 60 * 60 * 1000); // Refresh every 24 hours
});

let chart; // Store the chart instance globally

async function fetchPatientData() {
  try {
      const response = await fetch('/Clinic-Management-System/api/fetch_patient_data');
      const result = await response.json();
      
      if (result.error) {
          console.error("Error:", result.error);
          return;
      }

      // Manually define the days (since PHP doesn't return them)
     // const days = ["S", "M", "T", "W", "T", "F", "S"];

      if (!chart) {
      //  console.log(result.data);
          // If the chart does not exist, create it
          initializeChart(result.data, result.days);
      } else {
          // If the chart exists, update it
          chart.updateSeries([{ name: "Patients", data: result.data }]);
      }

      displayPercentageIncrease(result.percentageIncrease);
  } catch (error) {
      console.error("Failed to fetch patient data:", error);
  }
}

function initializeChart(patientCounts, days) {
  var numOptions = {
      chart: {
          height: 150,
          type: "bar",
          toolbar: { show: false },
      },
      plotOptions: {
          bar: {
              columnWidth: "70%",
              borderRadius: 2,
              distributed: true,
              dataLabels: { position: "center" },
          },
      },
      series: [{ name: "Patients", data: patientCounts }],
      legend: { show: false },
      xaxis: {
          categories: days, // Use predefined days array
          axisBorder: { show: false },
          labels: { show: true },
      },
      yaxis: { show: false },
      grid: {
          borderColor: "#d8dee6",
          strokeDashArray: 5,
          xaxis: { lines: { show: true } },
          yaxis: { lines: { show: false } },
          padding: { top: 0, right: 0, bottom: 0, left: 0 },
      },
      tooltip: {
          y: { formatter: (val) => val },
      },
      colors: [
          "rgba(255, 255, 255, 0.7)", "rgba(255, 255, 255, 0.6)", "rgba(255, 255, 255, 0.5)",
          "rgba(255, 255, 255, 0.4)", "rgba(255, 255, 255, 0.3)", "rgba(255, 255, 255, 0.2)",
          "rgba(255, 255, 255, 0.2)"
      ],
  };

  chart = new ApexCharts(document.querySelector("#dacActivity"), numOptions);
  chart.render();
}

function displayPercentageIncrease(percentage) {
  const badge = document.querySelector("#percentageBadge");

  if (percentage > 0) {
      badge.classList.remove("bg-success");
      badge.classList.add("bg-danger"); // Red for increase
      badge.innerHTML = `${percentage}%`;
      document.querySelector("#percentageText").innerHTML = "patients are higher<br>than last week.";
  } else if (percentage < 0) {
      badge.classList.remove("bg-danger");
      badge.classList.add("bg-success"); // Green for decrease
      badge.innerHTML = `${Math.abs(percentage)}%`;
      document.querySelector("#percentageText").innerHTML = "patients are lower<br>than last week.";
  } else {
      badge.classList.remove("bg-danger", "bg-success");
      badge.classList.add("bg-danger"); // Grey for no change
      badge.innerHTML = `0%`;
      document.querySelector("#percentageText").innerHTML = "No change from last week.";
  }
}