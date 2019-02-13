<?php $__env->startSection('title'); ?>
    New Patient
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


    <div class="col-12">
        <div class="card">
            <div class="card-header card-header-icon">
                <i class="fa fa-user-circle-o fa-2x"></i>
            </div>
            <div class="card-content">
                <?php echo $__env->make('user.doctor.patient.common.create-patient', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>
    </div>
    <?php echo $__env->make('user.doctor.patient.modal.success-modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-js'); ?>
    <script type="text/javascript" src="<?php echo e(url('/dashboard/plugins/parsleyjs/parsley.min.js')); ?>"></script>

    <script>
        $(document).ready(function () {
            var patientId = null;

            $.fn.newPatientSetPatientId = function (id) {
                patientId = id;
            };

            $("#modalBtnPrescribeNow").on('click',function () {
//                console.log(patientId);
                window.location.replace('/take-patient-to-prescription-page/'+patientId);
            });

            $("#modalBtnMakeAppointment").on('click',function () {
//                console.log(patientId);
                window.location.replace('/take-patient-to-appointment/'+patientId);
            });

            $("#modalBtnAddMedicalFile").on('click',function () {
               window.location.replace('/patient-medical-file/'+patientId);
            });


            $("#newPatient").on('submit',function (e) {
                e.preventDefault();
                var data = new FormData(this);
                $.ajax({
                    url:'<?php echo e(url('/save-patient')); ?>',
                    type:'POST',
                    data:data,
                    contentType: false,
                    cache: false,
                    processData:false,
                    success:function (data) {
                        console.log(data.image);
                        $("#patientSavedSuccessModal").modal('show');
                        $(this).formReset($("#newPatient"));
                        $(this).newPatientSetPatientId(data.id);
                        $("#modalPatientImage").attr('src',data.image != null ? data.image : 'http://via.placeholder.com/120x120');
                        $("#modalPatientName").text(data.name);
                        $("#modalPatientPhone").text(data.phone);
                    },error:function (data) {
                        if(data.status == 422 ){
                            $.each(data.responseJSON,function (key,data) {
                                for(var key in data) {
                                    if(key.length > 2){
                                        $.each(data[key],function (index,data) {
                                            $.Notification.notify('error','top right',data)
                                        })
                                    }
                                }
                            });
                        }else{
                            $.Notification.notify('warning','top right',"Internal server error",
                                "Internal server error" +
                                "Refresh this page and try again" +
                                "Or, contact to your system admin")
                        }
                    }
                });
            })
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>