let srn=0;

// .......................................

//main (insert) form validation
function error(){
    let fn=document.myForm.firstname.value;
    let ln=document.myForm.lastname.value;
    let e = document.myForm.email.value;
    let p = document.myForm.mobile.value;
    let s = document.myForm.salary.value;
    let bd = document.myForm.birthdate.value;
    let jd = document.myForm.joining_date.value;
    
    //.............................
    //first name
    if(fn ==""){
        $("#fnameerror").html("** please fill the firstname field !");
        return false ; 
    } 

    //.................................
    //last name
    if(ln ==""){
      $("#lnameerror").html("** please fill the lastname field !");
      return false ; 
    } 

    //................................
    //email
    if(e ==""){
      $("#emailerror").html("** please fill the email field !");
      return false ; 
    } 
    if(e.indexOf('@')<=0){
      $("#emailerror").html("** invalid @ position !");
      return false ; 
    }
    if((e.charAt(e.length-4)!='.') && (e.charAt(e.length-3)!='.')){
      $("#emailerror").html("** invalid . position !");
      return false ; 
    }  
 
    //.........................................
    //phone number
    if(p.length != 10){
      $("#mobileerror").html("** write a ten degit number !");
      return false ; 
    }
    if(isNaN(p)){
      $("#mobileerror").html("** only number are valid !");
      return false ;  
    }
    if(p[0]==0){
      $("#mobileerror").html("** zero is not valid at first number !");
      return false ;  
    }


    //..................................................
    //department

    //....................................................
    //salary
    if(s ==""){
      $("#salaryerror").html("** please fill the salary field !");
      return false ; 
    } 
    if(isNaN(s)){
      $("#salaryerror").html("** please enter salary in number !");
      return false ;  
    }
    if(s[0]==0){
      $("#salaryerror").html("** zero is not valid at first number !");
      return false ;  
    }

    //........................................................
    //birthdate
    if(bd ==""){
      $("#birthdateerror").html("** please fill the birthdate field !");
      return false ; 
    } 
    if((bd.indexOf('-')!=4) || (bd.indexOf('-',(4+1))!=7)){   
      $("#birthdateerror").html("** - is not in position , please follow this format : 'YYYY-MM-DD' !"); 
      return false ; 
    }
    if(bd.length!=10){
      $("#birthdateerror").html("** please follow this format : 'YYYY-MM-DD' !");
      return false ;
    }
    if(isNaN(bd[0]) ||isNaN(bd[1]) ||isNaN(bd[2]) ||isNaN(bd[3]) ||isNaN(bd[5]) ||isNaN(bd[6]) ||isNaN(bd[8]) ||isNaN(bd[9])){
      $("#birthdateerror").html("** please follow this format : 'YYYY-MM-DD' , do not use the alphabet or special characters !");
      return false ;
    }
    if(!((bd[5]==1)||(bd[5]==0))){
      $("#birthdateerror").html("** invalid month (MM) , please follow this format : 'YYYY-MM-DD' !");
      return false ;
    }
    if((bd[5]==1)&& !((bd[6]==0)||(bd[6]==1)||(bd[6]==2))){
      $("#birthdateerror").html("** invalid month (MM) , please follow this format : 'YYYY-MM-DD' !");
      return false ;
    }
    if(!((bd[8]==0)||(bd[8]==1)||(bd[8]==2)||(bd[8]==3))){
      $("#birthdateerror").html("** invalid day (DD) , please follow this format : 'YYYY-MM-DD' !");
      return false ;
    }
    if((bd[8]==3)&& !((bd[9]==0)||(bd[9]==1))){
      $("#birthdateerror").html("** invalid day (DD) , please follow this format : 'YYYY-MM-DD' !");
      return false ;
    }
    //........................................................
    //joining_date
    if(jd ==""){
      $("#joining_dateerror").html("** please fill the birthdate field !");
      return false ; 
    }   
    if((jd.indexOf('-')!=4) || (jd.indexOf('-',(4+1))!=7)){  
      $("#joining_dateerror").html("** - is not in position , please follow this format : 'YYYY-MM-DD' !");  
      return false ; 
    }
    if(jd.length!=10){
      $("#joining_dateerror").html("** please follow this format : 'YYYY-MM-DD' !");
      return false ;
    }
    if(isNaN(jd[0]) ||isNaN(jd[1]) ||isNaN(jd[2]) ||isNaN(jd[3]) ||isNaN(jd[5]) ||isNaN(jd[6]) ||isNaN(jd[8]) ||isNaN(jd[9])){
      $("#joining_dateerror").html("** please follow this format : 'YYYY-MM-DD' , do not use the alphabet or special characters !");
      return false ;
    }
    if(!((jd[5]==1)||(jd[5]==0))){
      $("#joining_dateerror").html("** invalid month (MM) , please follow this format : 'YYYY-MM-DD' !");
      return false ;
    }
    if((jd[5]==1)&& !((jd[6]==0)||(jd[6]==1)||(jd[6]==2))){
      $("#joining_dateerror").html("** invalid month (MM) , please follow this format : 'YYYY-MM-DD' !");
      return false ;
    }
    if(!((jd[8]==0)||(jd[8]==1)||(jd[8]==2)||(jd[8]==3))){
      $("#joining_dateerror").html("** invalid day (DD) , please follow this format : 'YYYY-MM-DD' !");
      return false ;
    }
    if((jd[8]==3)&& !((jd[9]==0)||(jd[9]==1))){
      $("#joining_dateerror").html("** invalid day (DD) , please follow this format : 'YYYY-MM-DD' !");
      return false ;
    }
}

 

//modal validation
function errorModal(){
  let fnm=document.myFormModal.firstnameModal.value;
  let lnm=document.myFormModal.lastnameModal.value;
  let em = document.myFormModal.emailModal.value;
  let pm = document.myFormModal.mobileModal.value;
  let sm = document.myFormModal.salaryModal.value;
  let bdm = document.myFormModal.birthdateModal.value;
  let jdm = document.myFormModal.joining_dateModal.value;
  
  //.............................
  //first name
  if(fnm ==""){
    $("#fnameerrorModal").html("** please fill the firstname field !");
    return false ; 
  } 
  //.................................
  //last name
  if(lnm ==""){
    $("#lnameerrorModal").html("** please fill the lastname field !");
    return false ; 
  } 
  //................................
  //email
  if(em ==""){
    $("#emailerrorModal").html("** please fill the email field !");
    return false ; 
  } 
  if(em.indexOf('@')<=0){
    $("#emailerrorModal").html("** invalid @ position !");
    return false ; 
  }
  if((em.charAt(em.length-4)!='.') && (em.charAt(em.length-3)!='.')){
    $("#emailerrorModal").html("** invalid . position !");
    return false ; 
  }  
  //.........................................
  //phone number
  if(pm.length != 10){
    $("#mobileerrorModal").html("** write a ten degit number !");
    return false ; 
  }
  if(isNaN(pm)){
    $("#mobileerrorModal").html("** only number are valid !");
    return false ;  
  }
  if(pm[0]==0){
    $("#mobileerrorModal").html("** zero is not valid at first number !");
    return false ;  
  }
  //....................................................
  //salary
  if(sm ==""){
    $("#salaryerrorModal").html("** please fill the salary field !");
    return false ; 
  } 
  if(isNaN(sm)){
    $("#salaryerrorModal").html("** please enter salary in number !");
    return false ;  
  }
  if(sm[0]==0){
    $("#salaryerrorModal").html("** zero is not valid at first number !");
    return false ;  
  }
  //........................................................
  //birthdate
  if(bdm ==""){
    $("#birthdateerrorModal").html("** please fill the birthdate field !");
    return false ; 
  } 
  if((bdm.indexOf('-')!=4) || (bdm.indexOf('-',(4+1))!=7)){  
    $("#birthdateerrorModal").html("** - is not in position , please follow this format : 'YYYY-MM-DD' !");  
    return false ; 
  }
  if(bdm.length!=10){
    $("#birthdateerrorModal").html("** please follow this format : 'YYYY-MM-DD' !");
    return false ;
  }
  if(isNaN(bdm[0]) ||isNaN(bdm[1]) ||isNaN(bdm[2]) ||isNaN(bdm[3]) ||isNaN(bdm[5]) ||isNaN(bdm[6]) ||isNaN(bdm[8]) ||isNaN(bdm[9])){
    $("#birthdateerrorModal").html("** please follow this format : 'YYYY-MM-DD' , do not use the alphabet or special characters !");
    return false ;
  }
  if(!((bdm[5]==1)||(bdm[5]==0))){
    $("#birthdateerrorModal").html("** invalid month (MM) , please follow this format : 'YYYY-MM-DD' !");
    return false ;
  }
  if((bdm[5]==1)&& !((bdm[6]==0)||(bdm[6]==1)||(bdm[6]==2))){
    $("#birthdateerrorModal").html("** invalid month (MM) , please follow this format : 'YYYY-MM-DD' !");
    return false ;
  }
  if(!((bdm[8]==0)||(bdm[8]==1)||(bdm[8]==2)||(bdm[8]==3))){
    $("#birthdateerrorModal").html("** invalid day (DD) , please follow this format : 'YYYY-MM-DD' !");
    return false ;
  }
  if((bdm[8]==3)&& !((bdm[9]==0)||(bdm[9]==1))){
    $("#birthdateerrorModal").html("** invalid day (DD) , please follow this format : 'YYYY-MM-DD' !");
    return false ;
  }
  //........................................................
  //joining_date
  if(jdm ==""){
    $("#joining_dateerrorModal").html("** please fill the joining date field !");
    return false ; 
  }   
  if((jdm.indexOf('-')!=4) || (jdm.indexOf('-',(4+1))!=7)){   
    $("#joining_dateerrorModal").html("** - is not in position , please follow this format : 'YYYY-MM-DD' !"); 
    return false ; 
  }
  if(jdm.length!=10){
    $("#joining_dateerrorModal").html("** please follow this format : 'YYYY-MM-DD' !");
    return false ;
  }
  if(isNaN(jdm[0]) ||isNaN(jdm[1]) ||isNaN(jdm[2]) ||isNaN(jdm[3]) ||isNaN(jdm[5]) ||isNaN(jdm[6]) ||isNaN(jdm[8]) ||isNaN(jdm[9])){
    $("#joining_dateerrorModal").html("** please follow this format : 'YYYY-MM-DD' , do not use the alphabet or special characters !");
    return false ;
  } 
  if(!((jdm[5]==1)||(jdm[5]==0))){
    $("#joining_dateerrorModal").html("** invalid month (MM) , please follow this format : 'YYYY-MM-DD' !");
    return false ;
  }
  if((jdm[5]==1)&& !((jdm[6]==0)||(jdm[6]==1)||(jdm[6]==2))){
    $("#joining_dateerrorModal").html("** invalid month (MM) , please follow this format : 'YYYY-MM-DD' !");
    return false ;
  }
  if(!((jdm[8]==0)||(jdm[8]==1)||(jdm[8]==2)||(jdm[8]==3))){
    $("#joining_dateerrorModal").html("** invalid day (DD) , please follow this format : 'YYYY-MM-DD' !");
    return false ;
  }
  if((jdm[8]==3)&& !((jdm[9]==0)||(jdm[9]==1))){
    $("#joining_dateerrorModal").html("** invalid day (DD) , please follow this format : 'YYYY-MM-DD' !");
    return false ;
  }
}

// search input validation
function errorSerch(){
  let filterFirstName = document.filterNameForm.filterFirstName.value;
  let filterLastName = document.filterNameForm.filterLastName.value;

  if (filterFirstName == "" && filterLastName == ""){
    $("#errorMsgSearch").html("** please fill the firstname field or lastname field !");
    return false;
  }
}




// ....................................................................
$(document).ready(()=>{
  $("#maxRows").change(()=>{
    $("#numOfRowForm").submit();
  })

  $("#highSal").click(()=>{
    window.location = `list.php?top5Salary`;
  })
  $("#lowSal").click(()=>{
    window.location = `list.php?bottom5Salary`;
    // $("#sortid").text("kakak");
  })
  $("#joinBtn").click(()=>{
    window.location = `list.php?joinedThisMonth`;
  })
  $("#departmentSearch").change(()=>{
    $("#filterDepForm").submit();
  })
})





