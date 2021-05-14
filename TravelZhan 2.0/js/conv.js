document.addEventListener('DOMContentLoaded', function() {
  
  document.getElementById("amount").addEventListener("input",calculate);
  document.getElementById("rate").addEventListener("change",ChangeCurreny);

  function calculate(){
       let amount = document.getElementById("amount").value;
       let rate = document.getElementById("rate").value;
       
    if(rate == "select"){
           document.getElementById("kzt").setAttribute("placeholder","select currency");
    }else{
       let compute = amount * rate;
       
      document.getElementById("kzt").value = compute;
    }
  }
  
  function ChangeCurreny(){
    let rate = document.getElementById("rate").value;
    let amount = document.getElementById("amount").value;
    
 
    let compute = rate * amount;
      document.getElementById("kzt").value = compute.toFixed(2);
      
    
  }
  
  

  let menu = document.querySelectorAll('select');
   M.FormSelect.init(menu,{});
   
});