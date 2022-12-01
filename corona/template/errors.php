<?php if (count($errors) > 0) : ?>
  <div>
  	<?php foreach ($errors as $error) : ?>
  	  <p><?php echo '
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>'.$errors.'</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>
