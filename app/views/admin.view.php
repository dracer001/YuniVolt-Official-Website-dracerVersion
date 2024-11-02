<!DOCTYPE html>
<html lang="en">
    <head>


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/bootstrap/bootstrap.css" type="text/css">
    <script src="<?=ROOT?>/assets/bootstrap/bootstrap.bundle.js" defer> </script>
    <title><?=ucfirst(App::$page)?> | <?=APP_NAME?></title> 
 

<!-- reqiured css -->
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/base.css" type="text/css">
<!--Page Css-->
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/<?=App::$page?>.css" type="text/css">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<!-- Page Js -->
    <script src="<?=ROOT?>/assets/js/<?=App::$page?>.js" defer> </script>
         
  
    </head>
    <body>
        <input type="hidden" id="root-url" value="<?=ROOT?>">

        <ul class="nav nav-tabs container-fluid">
            <li class="nav-item">
                <button class="nav-link active" data-page="init">Init App</button>
            </li>
            <li class="nav-item">
                <button class="nav-link" data-page="view-gallary">View Gallary</button>
            </li>
            <li class="nav-item">
                <button class="nav-link" data-page="upload-gallary">Upload Gallary</button>
            </li>
        </ul>

        <main>
            <section class="page" id="init-app">
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
            </section>

            <section class="page my-5" id="upload-gallary">
                <div class="container form-container">
                <h2 class="text-center text-primary mb-4"><i class="bi bi-upload"></i> Upload Gallary Image</h2>
                
                <!-- Form Starts -->
                <form class="border rounded-3 shadow-lg p-4" id="gallary-form">
                <div id="server-msg"></div>
                    <!-- Image Upload -->
                    <div class="mb-3">
                        <label for="imageUpload" class="form-label">Upload Image</label>
                        <input class="form-control" type="file" id="imageUpload" accept="image/*" multiple required>
                        <div class="invalid-feedback">Error message here</div>
                    </div>

                    <!-- Caption -->
                    <div class="mb-3">
                        <label for="caption" class="form-label">Caption</label>
                        <input type="text" class="form-control" id="caption" placeholder="Enter image caption" required>
                        <div class="invalid-feedback">Error message here</div>
                    </div>

                    <!-- Collection Selection -->
                    <div class="mb-3">
                        <label for="collectionSelect" class="form-label">Choose Collection</label>
                        <input class="form-control" list="collection-list" id="collectionSelect" required>
                        <datalist id="collection-list">
                            <?php if($collections !== NULL): ?>
                                <?php foreach ($collections as $collection): ?>
                                    <option value="<?=$collection->name?>"><?=$collection->name?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </datalist>
                        <div class="invalid-feedback">Error message here</div>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-blue" id="submit-gallary"><i class="bi bi-check-circle"></i> Add to Collection</button>
                    </div>
                </form>
                </div>
            </section>
        </main>

    </body>
</html>
