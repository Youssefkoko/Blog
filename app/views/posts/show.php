<?php require_once APPROOT . '/views/inc/header.php' ?>


<a href="<?php echo URLROOT; ?> /posts/" class="btn btn-light">
  <i class="fa fa-backward"></i>
  Back</a>


<h4><?php echo $data['post']->title; ?></h4>
<div class="bg-secondery text-white p-2 mb-3">
  Written By:
  <?php echo $data['user']->name; ?> on <?php echo $data['post']->created_at; ?>
</div>

<p class="lead"><?php echo $data['post']->body;   ?></p>
<?php if ($data['post']->user_id == $_SESSION['user_id']) : ?>
  <a href="<?php echo URLROOT;  ?> /posts/edit/<?php echo $data['post']->id ?>" class="btn btn-dark">Edit</a>
  <form class="pull-right" action="<?php echo URLROOT; ?>/posts/delete/<?php echo $data['post']->id; ?>" method="post">
    <input type="submit" value="Delete" class="btn btn-danger">
  </form>



<?php endif ?> <?php require_once APPROOT . '/views/inc/footer.php' ?>