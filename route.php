<?php
use Http\Controllers\install\Installer;


$router->get('/install',           [Installer::class, 'welcome']);
$router->post('/install-check',    [Installer::class, 'requirements']);
$router->get('/install-db',        [Installer::class, 'dbForm']);
$router->post('/install-db',       [Installer::class, 'saveDb']);
$router->post('/install-run',      [Installer::class, 'runMigrations']);
$router->post('/install-finish',   [Installer::class, 'finish']);


// INDEX
$router->get("/","index.php")->only("guest");
$router->post("/login","Sessions/store.php")->only("guest");


// REGISTRATION
$router->get('/register', 'registration/create.php')->only('guest');
$router->post('/register', 'registration/store.php')->only('guest');

// DASHBOARD
$router->get("/dashboard","Dashboard.php")->only("auth");



$router->get("/Book-Appointment","book_appointment.php")->only("guest");
$router->post("/book-appointment","store.php")->only("guest");

// APIS
$router->get("/api/fetch_patient_data","apis/fetch_patient_data.php")->only("auth");
$router->get("/api/fetch_patient_stats","apis/fetch_patient_stat.php")->only("auth");
$router->get("/api/fetch_yearly_patient_data","apis/fetch_yearly_patient_data.php")->only("auth");
$router->get("/newapi","apis/fetch_news.php")->only("auth");
$router->get("/Search-For-Prescription","apis/Search_for_Prescription.php")->only("auth");
$router->get("/Search-For-Student","apis/search_student.php")->only("auth");
$router->get("/Edit","apis/fetch_edit_Patients.php")->only("auth");
$router->get("/GenerateToken","apis/generate_token.php")->only("admin&student");
$router->get("/SearchDrug","apis/search_drug.php")->only("auth");
//$router->get("/verify_email","apis/verify_email.php")->only("auth");

// PATIENTS
$router->get("/Patients-List","Patients/List.php")->only("auth");
$router->post("/Delete_Patient","Patients/destroy.php")->only("admin&student");
$router->get("/Add-Patients","Patients/Add_Patients.php")->only("auth");
$router->get("/Add-Staff","Patients/Add_Staff.php")->only("auth");
$router->post("/Prescribe","Patients/store.php")->only("auth");
$router->get("/Edit-Patients","Patients/edit_Patients.php");
$router->patch('/update', 'Patients/update.php')->only("auth");


// APPOINTMENTS
$router->get("/Appointments","Appointments/Appointments.php")->only("auth");
$router->get("/Appointments-List","Appointments/Appointment_list.php")->only("auth");
$router->get("/Book-Appointments","Appointments/Book_Appointment.php")->only("auth");
$router->post("/Book","Appointments/store.php")->only("auth");
$router->post("/Approve_Appointment","Appointments/approve.php")->only("auth");
$router->post("/Reject_Appointment","Appointments/reject.php")->only("auth");
$router->post("/Delete_Appointment","Appointments/destroy.php")->only("auth");
$router->get("/Edit-Appointments","Appointments/Edit_Appointment.php")->only("auth");
$router->patch('/book-update', 'Appointments/update.php')->only("auth");
$router->get("/fetch-appointments","Appointments/fetch_Appointment.php")->only("auth");


// PRESCRIPTIONS
$router->get("/Add-Prescription","Prescription/Add_Prescription.php")->only("auth");
$router->patch('/updatePrescription', 'Prescription/update.php')->only("auth");
$router->get("/Prescription-List","Prescription/Prescription_list.php")->only("auth");

// DRUGS
$router->get("/Add-Drug","Drug/Add_Drug.php")->only("auth");
$router->post("/add","Drug/store.php")->only("auth");
$router->patch('/updateDrug', 'Drug/update.php')->only("auth");
$router->post("/addDrugCategory","Drug/add_category.php")->only("auth");
$router->get("/Drug-List","Drug/Drug_list.php")->only("auth");
$router->get("/Edit-Drug","Drug/edit_drug.php")->only("auth");

// NEWS & UPDATES
$router->get("/News","News&Update.php")->only("auth");

// TOKEN
$router->get("/token","generate_token.php")->only("admin&student");



// LOGOUT
$router->delete("/logout","Sessions/destroy.php")->only("auth");
$router->get("/logout","Sessions/destroy.php")->only("auth");