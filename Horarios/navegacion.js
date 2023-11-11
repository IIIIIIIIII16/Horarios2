window.addEventListener("scroll", function(){
  var header = document.getElementById("interior")
  if (window.scrollY>0) {
      header.style.backgroundColor="blue";
  }else{
      header.style.backgroundColor="transparent";
  }
})