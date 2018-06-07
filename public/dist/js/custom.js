/**
 * Created by ITMart on 8/4/17.
 */

   $(".count-number").counterUp({delay: 10, time: 5e3});
jQuery(document).ready(function($) {
//    $('.count-number').counterUp({
//        delay: 10,
//        time: 1000
//    });
});


$(function(){
    var current = window.location.href;
    var parentli='treeview'
    $('.treeview li a').each(function(){
        var $this = $(this);
        // if the current path is like this link, make it active
        if($this.attr('href').indexOf(current) !== -1){
            $this.parent().addClass('active');
            parentli=$this.parent().parent();
            parentli.parent().addClass('active');
        }
    })

    $(".delete-btn").click(function (e) {
        e.preventDefault();
        var self = $(this);
        console.log(self.data('title'));
        swal({
            title: self.data('title') || "Are you sure?",
            text: self.data('text') || "Do Your Want To Delete This Records ???",
            type: self.data('type') || "warning",
            showCancelButton: true,
            cancelButtonClass: 'btn-secondary waves-effect',
            confirmButtonClass:self.data('confirmButtonClass')|| 'btn-warning',
            confirmButtonText: self.data('confirmButtonText') || "Yes, delete it!",
            closeOnConfirm: false
        }, function () {
            location.href = self.attr('href');
        });
    });
})