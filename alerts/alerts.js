document.addEventListener('DOMContentLoaded',() =>{
  setTimeout(() =>{
    ['updateAlert', 'popup-success', 'deleteAlert'].forEach(id =>{
      const el=document.getElementById(id);
      if (el) el.remove();
    });
  },3000);
});