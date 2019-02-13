<b><?php echo e($patient->name); ?></b> <br>
Gender : <?php if($patient->gender ==1): ?>
    Male
<?php elseif($patient->gender == 2): ?>
    Fe-Male
<?php else: ?>
    Other
<?php endif; ?>
<br>
Age : <?php echo e($patient->age()); ?> <br>

<a href="javascript:void(0);" onclick="window.location.replace('<?php echo e(url('/take-patient-to-prescription-page/'.$patient->id)); ?>')"><i class="ti ti-ink-pen"></i> Prescribe Now </a>
<br>
<a href="javascript:void(0);" onclick="window.location.replace('<?php echo e(url('/take-patient-to-appointment/'.$patient->id)); ?>')"><i class="ti ti-calendar"></i> New Appointment </a>
