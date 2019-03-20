/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function deletectn(el,id){

   console.log(id);
  
         const swalWithBootstrapButtons = Swal.mixin({
  confirmButtonClass: 'btn btn-success',
  cancelButtonClass: 'btn btn-danger',
  buttonsStyling: false,
});

swalWithBootstrapButtons.fire({
  title: 'Are you sure?',
  text: "Do you won't delete this canteen?",
  type: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes',
  cancelButtonText: 'No',
  reverseButtons: true
}).then((result) => {
  if (result.value) {
      $.ajax({
     url: "delete/"+id,
     success: function (data) {
        console.log(data.name);
       
    swalWithBootstrapButtons.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
              
    )
      location.reload();   
    }
      })
  } else if (
    // Read more about handling dismissals
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire(
      'Cancelled',
      'Your imaginary file is safe :)',
      'error'
    );
  }
});

     }
     
     
     function deleteing(el,id){

   console.log(id);
  
         const swalWithBootstrapButtons = Swal.mixin({
  confirmButtonClass: 'btn btn-success',
  cancelButtonClass: 'btn btn-danger',
  buttonsStyling: false,
});

swalWithBootstrapButtons.fire({
  title: 'Are you sure?',
  text: "Do you won't delete this canteen?",
  type: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes',
  cancelButtonText: 'No',
  reverseButtons: true
}).then((result) => {
  if (result.value) {
      $.ajax({
     url: "deleteing/"+id,
     success: function (data) {
        console.log(data.name);
       
    swalWithBootstrapButtons.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
              
    )
      location.reload();   
    }
      })
  } else if (
    // Read more about handling dismissals
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire(
      'Cancelled',
      'Your imaginary file is safe :)',
      'error'
    );
  }
});

     }
     
     
     
     
    

