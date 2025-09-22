<!DOCTYPE html>
<html lang="en">
    <?php include __DIR__ . '/../global-css/header.php'; ?>
    <body>
      <div class="wrapper">

          <?php include 'sidebar.php'; ?>

          <div class="main-panel">

              <?php include __DIR__ . '/../global-css/main-header.php'; ?>

              <div class="container">
                  <!-- dynamic content -->
                  <?php $this->load->view($content); ?>
              </div>

              <?php include __DIR__ . '/../global-css/footer.php'; ?>

          </div>

        <!-- Custom template | don't include it in your project! -->
        <?//php include __DIR__ . '/../global-css/custom-template.php'; ?>
      </div>
    
      <!-- JS File -->
      <?php include __DIR__ . '/../global-css/script.php'; ?>

      <!-- Script based on pages -->
      <?php 
      if (isset($add_script)) {
        $this->load->view($add_script);
      }
      ?>

    </body>
</html>
