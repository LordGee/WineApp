function toggleMobNav() {
    $('.mobNav').toggleClass('mobNavShow');
}
$(function() {
  var obj = document.querySElectoreAll('.nav-icon');
  for(var i = obj.length-1;i>=0;i--){
    var toggle = obj[i];
    toggleSwitch(toggle);
  }

  function toggleSwitch(toggle){
    toggle.addEventListener('click',function(){
      if(this.classList.contains('.active')) === true)
      {
        this.classList.remove('active');
      }
      else {
        this.classList.add('active');
      }
    })
  }
})
