<?php

echo "bew";

?>


<!-- image popup open -->
<div id="image_form_modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    <button type="button" class="close btn btn-danger" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h4>
            </div> <!-- modal-header -->
            <br>
            <div id="image_popup" class="text-center">

            </div>
            <br>
            <div class="modal-body">
                <img src=<?php echo $image_src ?> height='200' width='200' class='img-circle'>


            </div> <!-- modal-body -->
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>

            </div> <!-- modal-footer -->

        </div> <!-- modal-content -->
    </div> <!-- modal dialog -->
</div> <!-- modal fade -->



<!-- login_form_close -->