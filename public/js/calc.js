"use strict";
  let oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
  let thisDay = new Date();
  let today = thisDay.getTime();
  let thisYear = thisDay.getFullYear();
  let succMessage, errMessage,infs,startStatus,endStatus;

  //Get Day names from given dates
  const day_name = function(dt){
    let days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    return days[dt.getDay()];
  }

  //Get Month names from given dates
  const month_name = function(dt){
      let months = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ];
      return months[dt.getMonth()];
    };

  //Get Month names from given dates without array
    function month_names(dt) {
      const objDate = new Date(dt);
      const locale = "en-us";
      const month = objDate.toLocaleString(locale, {
          month: "long"
      });
      return month;
  }

  //Function that captures IDs

  function _(x){
    return document.getElementById(x);
  }
  //Function that captures Classes
  function _cls(x){
    return document.getElementsByClassName(x);
  }

  //Calculate days for booking leave
  _("leaveBtn").addEventListener("click", caLeave);

  function caLeave(){
    //Start date
      let startdate = document.forms["leaveForm"]["startdate"].value;
      let start = new Date(startdate);
      let firstTime= start.getTime();//Returns the number of milliseconds since midnight Jan 1 1970, and a specified date
      let firstDate = start.getDate();//Returns the day of the month (from 1-31)
      // let firstData = start.getDay();//Returns the day of the week (from 0-6)
      // let firstDay = day_name(start);//Returns the name of the day (from Sunday-Monday)
      let firstmonth = month_name(start);//Returns the name of the month (from January-December)

    //End date
    let enddate = document.forms["leaveForm"]["enddate"].value;
    let end = new Date(enddate);
    let secondTime = end.getTime();
    // let secondDate = end.getDate();//Returns the day of the month (from 1-31)
    // let secondData = end.getDay();//Returns the day of the week (from 0-6)
    // let secondDay = day_name(end);//Returns the name of the day (from Sunday-Monday)
    // let secondmonth = month_name(end);//Returns the name of the month (from January-December)
    
    if(startdate ==''){
    console.log("Start date cannot be left blank");
      return false;
    }
    else if(enddate ==''){
      console.log("End date cannot be left blank");
      return false;
    }
    else if (startdate<today){
      console.log("You cannot request for days in the past ");
      return false;
    }

    //Calculating the leave duration excluding weekends
    let diffDays = Math.round(Math.abs((secondTime - firstTime)/(oneDay)));
    let lists = [];

    //loop through the selected days to make an array of days(names)
    for(let i=0; i<=diffDays; i++){

      let nextDate = firstDate++;
      let nextName = day_name(new Date(nextDate+"/"+firstmonth+"/"+thisYear));
      lists.push(nextName);
      let max = diffDays+1;

      if(lists.length == max){

        //The function to determine the occurance of weekends from the booked days
        function getOccurrence(array, value) {
          let count = 0;
          array.forEach((v) => (v === value && count++));
          return count;
        }

        //Skipping saturdays and sundays
        let noSunday = getOccurrence(lists, "Sunday");
        let noSaturday = getOccurrence(lists, "Saturday");
        let except  = noSunday + noSaturday;
        let booked = max - except;
        
        // Save the duration in local storage
        localStorage.setItem("booked",booked);
      }

    }
    $.ajax({
      type :"POST",
      url  :"leaves",
      data :{
        '_token' : $('input[name=_token]').val(),
        'leaveType' : $('#leaveType').val(),
        'startdate' : $('input[name=startdate]').val(),
        'enddate' : $('input[name=enddate]').val(),
        'leavedetail' : $('#leavedetail').val(),
        'duration' : localStorage.getItem("booked"),
        'status' : $('input[name=status]').val(),
      },
      success:function(data){
        $('#leaveForm')[0].reset();
        $('#addleave').modal('hide');
        location.reload();
        },
      error:function(){
        console.error();
      }
    });
   }

  /* 
  Exporting data to excel
  */
 function exportExcel(tableId, filename=''){
  let downloadLink;
  let dataType = 'application/vnd.ms-excel';
  let tableSelect = _(tableId);
  let tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

  //Specifying file name
  filename = filename?filename+'.xlsx':'excel_data.xlsx';

  //Creating download link element
  downloadLink = document.createElement("a");
  downloadLink = document.createElement("a");

  document.body.appendChild(downloadLink);

  if(navigator.msSaveOrOpenBlob){
    let blob = new Blob(['\ufeff',tableHTML],{
      type: dataType
    });
    navigator.msSaveOrOpenBlob(blob,filename);
  }
  else{
    //Create a link to the file
    downloadLink.href = 'data:' +dataType+','+tableHTML;

    //Setting the file name
    downloadLink.download = filename;
    
    //Triggering the function
    downloadLink.click();
    }
  }

  //Reseting Password
  let passForm = _("passForm");
  let currpassword = _("currpassword");
  let newpassword = _("newpassword");
  let confpassword = _("confpassword");
  let oldpass = _("oldpass");
  let newpass = _("newpass");
  let conpass = _("conpass");
  // Adding Event Listeners
  function updatePass(){
    if(currpassword.value==""){
      currpassword.style.border = "3px solid red";
      oldpass.textContent = "Enter Current Password";
      currpassword.focus();
      return false;
    }
    else if(newpassword.value==""){
      newpassword.style.border = "3px solid red";
      newpass.textContent = "Enter new Password";
      newpassword.focus();
      return false;
    }
      else if(confpassword.value==""){
      confpassword.style.border = "3px solid red";
      conpass.textContent = "Confirm new Password";
      confpassword.focus();
      return false;
    }
      else if(newpassword.value != confpassword.value){
      newpassword.style.border = "3px solid red";
      confpassword.style.border = "3px solid red";
      conpass.innerHTML = "The passwords do not match";
      confpassword.focus();
      return false;
    }else{
      let notice = _('notice');
      $(document).on('submit', '#passForm', function(e) {
        $.post('includes/classes/fetch.php',
        $('#passForm').serialize(),
        function( result ) {  
        notice.textContent = (result);  
        $('#passForm')[0].reset();  
        });
        e.preventDefault();
      });
    }
  }

  function exportExcel(tableId, filename=''){
    let downloadLink;
    let dataType = 'application/vnd.ms-excel';
    let tableSelect = _(tableId);
    let tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

    //Specifying file name
    filename = filename?filename+'.xls':'excel_data.xls';

    //Creating download link element
    downloadLink = document.createElement("a");

    document.body.appendChild(downloadLink);

    if(navigator.msSaveOrOpenBlob){
        let blob = new Blob(['\ufeff',tableHTML],{
          type: dataType
        });
        navigator.msSaveOrOpenBlob(blob,filename);
    }else{
    //Create a link to the file
      downloadLink.href = 'data:' +dataType+','+tableHTML;

    //Setting the file name
    downloadLink.download = filename;

    //Triggering the function
    downloadLink.click();
    }
  }

  function runCounter(startdate){
  let countdown = document.querySelector('.countdown');
  //Set launch date (miliseconds)
  let launchDate = new Date(startdate).getTime();
  //Update every second
  let intvl = setInterval(()=>{
    //Distance between now and launch date
    let distance = launchDate - today;
    //Time calculations
    let days = Math.floor(distance / (1000*60*60*24));
    let hours = Math.floor((distance % (1000*60*60*24))/(1000*60*60));
    let minutes = Math.floor((distance % (1000*60*60))/(1000*60));
    let seconds = Math.floor((distance % (1000*60))/1000);
    if(distance<=0){
      console.log("Launch Date Reached");
      clearInterval(intvl);
    }
  
    },1000);
  }
  //runCounter(7/9/2018);
  function getDates(){
    let enddate =_("deadln").value;
    console.log(distance);
    if(isNaN(enddate)){
      console.log("Please Enter the date");
      }else{
        runCounter(enddate);
    }
  }
  /**
   * Get consultants for a given opportunity
   * 
   */

  let team = _("inputTeam");
  let assignees = _("assignees");

  team.addEventListener("change", updateAssignees);

  function updateAssignees(event) {
    assignees.innerHTML=null;
    let options = document.createDocumentFragment();
    //add an empty option
    options.appendChild(createOption("--select--", ""));
    //bail out for empty selections
    if (!team.value) return;
    window.APP_USERS.forEach(function(user) {
      if (user.team === team.value) {
        //add an option to the assigns
        options.appendChild(createOption(user.name, user.name));
      }
    });
    assignees.appendChild(options);
  }

  function createOption(text, value) {
    let option = document.createElement("option");
    option.text = text;
    option.value = value;
    return option;
  }
