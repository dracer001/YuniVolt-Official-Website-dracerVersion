<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- include head meta-data -->
        <?php $this->view('includes/head', $data) ?>
    </head>
    <body>
<input type="hidden" id="root-url" value="<?=ROOT?>">

            <div class="d-flex justify-content-center align-items-center" style="min-height:100vh;">
                <div>
                    <button class="btn btn-primary" id="init-btn">INIALIZE APP</button>
                    <div class="init_status d-flex flex-column align-items-center mt-3">
                        <div class="server_status text-center" id="server_status"></div>
                        <div class="spinner-grow text-primary d-none" role="status" id="loading">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
            </div>
    </body>
</html>
