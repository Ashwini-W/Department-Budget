function checkdl() {
    var department = document.querySelector("#department").value;
    var lab = document.querySelector("#lab").value;
    if ((department == "") || (lab == "")) {
        alert("Please select department name and lab name");
        return false;
    }
    // if (lab == "") {
    //     alert("Please select lab name");
    //     return false;
    // }
    else {


        // window.location.href = "viewedit.php/";
        // return TRUE;
        // window.location.href ='viewedit.php?lat="+department+"&lon="+lab+"&setLatLon=Set';
        window.location.href = `viewedit.php?edepartment=${department}&elab=${lab}&setLatLon=Set`;

    }

}