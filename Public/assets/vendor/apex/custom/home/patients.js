// var  patientOptions = {
//   chart: {
//     height: 300,
//     type: "line",
//     toolbar: {
//       show: false,
//     },
//   },
//   dataLabels: {
//     enabled: false,
//   },
//   fill: {
//     type: 'solid',
//     opacity: [0.1, 1],
//   },
//   stroke: {
//     curve: "smooth",
//     width: [0, 4]
//   },
//   series: [{
//     name: 'New Patients',
//     type: 'area',
//     data: [400, 550, 350, 450, 300, 350, 270, 320, 330, 410, 300, 490]
//   }, {
//     name: 'Return Patients',
//     type: 'line',
//     data: [200, 400, 250, 350, 200, 350, 370, 520, 440, 610, 600, 380]
//   }],
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
//   xaxis: {
//     categories: [
//       "Jan",
//       "Feb",
//       "Mar",
//       "Apr",
//       "May",
//       "Jun",
//       "Jul",
//       "Aug",
//       "Sep",
//       "Oct",
//       "Nov",
//       "Dec",
//     ],
//   },
//   yaxis: {
//     labels: {
//       show: false,
//     },
//   },
//   legend: {
//     position: 'bottom',
//     horizontalAlign: 'center',
//   },
//   colors: ["#116AEF", "#0ebb13", "#5394F5", "#75AAF9", "#96BFFC", "#B7D4FF"],
//   markers: {
//     size: 0,
//     opacity: 0.3,
//     colors: ["#116AEF", "#0ebb13", "#5394F5", "#75AAF9", "#96BFFC", "#B7D4FF"],
//     strokeColor: "#ffffff",
//     strokeWidth: 1,
//     hover: {
//       size: 7,
//     },
//   },
//   tooltip: {
//     y: {
//       formatter: function (val) {
//         return val;
//       },
//     },
//   },
// };

// var patientsChart = new ApexCharts(document.querySelector("#patients"), patientOptions);
// patientsChart.render();


async function fetchPatientStats() {
  try {
      const response = await fetch('/Clinic-Management-System/api/fetch_patient_stats');
      const result = await response.json();

      if (result.error) {
          console.error("Error:", result.error);
          return;
      }

      updatePatientChart(result.newPatients, result.returningPatients, result.months);
  } catch (error) {
      console.error("Failed to fetch patient stats:", error);
  }
}

function updatePatientChart(newPatients, returningPatients, months) {
  var patientOptions = {
      chart: {
          height: 300,
          type: "line",
          toolbar: { show: false },
      },
      dataLabels: { enabled: false },
      fill: { type: 'solid', opacity: [0.1, 1] },
      stroke: { curve: "smooth", width: [0, 4] },
      series: [
          { name: 'New Patients', type: 'area', data: newPatients },
          { name: 'Returning Patients', type: 'line', data: returningPatients }
      ],
      grid: {
          borderColor: "#d8dee6",
          strokeDashArray: 5,
          xaxis: { lines: { show: true } },
          yaxis: { lines: { show: false } },
          padding: { top: 0, right: 0, bottom: 0, left: 0 },
      },
      xaxis: {
          categories: months,
      },
      yaxis: { labels: { show: false } },
      legend: { position: 'bottom', horizontalAlign: 'center' },
      colors: ["#116AEF", "#0ebb13"],
      markers: {
          size: 0,
          opacity: 0.3,
          colors: ["#116AEF", "#0ebb13"],
          strokeColor: "#ffffff",
          strokeWidth: 1,
          hover: { size: 7 },
      },
      tooltip: {
          y: { formatter: (val) => val },
      },
  };

  var patientsChart = new ApexCharts(document.querySelector("#patients"), patientOptions);
  console.log(patientsChart);
  patientsChart.render();
}

async function fetchYearlyPatientData() {
    try {
        const response = await fetch('/Clinic-Management-System/api/fetch_yearly_patient_data');
        const result = await response.json();

        const infoDiv = document.querySelector(".percent");
        
        if (typeof result.percentageIncrease === "number") {
            infoDiv.innerHTML = `${result.percentageIncrease}% higher than last year.`;
        } else {
            infoDiv.innerHTML = result.percentageIncrease;
        }
    } catch (error) {
        console.error("Failed to fetch yearly patient data:", error);
    }
}
// Call the function to fetch data on page load
fetchPatientStats();
document.addEventListener("DOMContentLoaded", fetchYearlyPatientData);