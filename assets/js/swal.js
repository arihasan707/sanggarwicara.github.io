const flashData = $('.flash-data').data('flashdata');
console.log(flashData);

if (flashData){
    Swal({
        title : 'data',
        text :'berhasil',
        type :'success'

    });
}