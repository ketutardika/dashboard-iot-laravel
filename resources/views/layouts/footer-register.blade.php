<!-- core:js -->
<script src="{{ asset('assets/vendors/core/core.js') }}"></script>
<!-- End plugin js for this page -->

<!-- Plugin js for this page -->
<script src="{{ asset('assets/vendors/jquery-steps/jquery.steps.min.js') }}"></script>

<!-- inject:js -->
<script src="{{ asset('assets/vendors/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('assets/js/template.js') }}"></script>
<!-- endinject -->


<!-- End plugin js for this page -->
<!-- Custom js for this page -->
<script src="{{ asset('assets/js/wizard.js') }}"></script>
<!-- End custom js for this page -->
<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr><td><input type="text"  wire:model="data[' + i  +'][section_names]" name="data[' + i + '][section_names]" placeholder="Enter Section" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
            );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>
