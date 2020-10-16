<!DOCTYPE html>
<html lang="en">

<head>
    <?= $this->load->view('partial/header') ?>
</head>

<body class="app">
    <?= $this->load->view('partial/sidebar') ?>
    <div class="flex">
        <?= $this->load->view('partial/sidemenu'); ?>
        <div class="content">
            <?= $this->load->view('partial/topbar'); ?>

            <div class="intro-y flex items-center mt-8">
                <h2 class="text-lg font-medium mr-auto">
                    Add Portfolio
                </h2>
            </div>
            <form action="#" method="post" enctype="multipart/form-data">
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="intro-y col-span-12 lg:col-span-6">
                        <!-- BEGIN: Form Layout -->
                        <div class="intro-y box p-5">
                            <div>
                                <label>Client</label>
                                <input type="text" class="input w-full border mt-2" placeholder="Input text">
                            </div>
                            <div class="mt-3">
                                <label>Product Name</label>
                                <input type="text" class="input w-full border mt-2" placeholder="Input text">
                            </div>
                            <div class="mt-3">
                                <label>Category</label>
                                <div class="mt-2">
                                    <select data-placeholder="Select your favorite actors" class="tail-select w-full" multiple>
                                        <option value="1" selected>Sport & Outdoor</option>
                                        <option value="2">PC & Laptop</option>
                                        <option value="3" selected>Smartphone & Tablet</option>
                                        <option value="4">Photography</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mt-3">
                                <label>Link Demo</label>
                                <input type="text" class="input w-full border mt-2" placeholder="Input text">
                            </div>

                        </div>

                    </div>
                    <div class="intro-y col-span-12 lg:col-span-6">
                        <!-- BEGIN: Form Layout -->
                        <div class="intro-y box p-5">

                            <div class="">
                                <label>Description</label>
                                <div class="mt-2">
                                    <div data-simple-toolbar="true" class="editor" name="editor">
                                        <p>Content of the editor.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <label>Upload Image</label>
                                <div class="border-2 border-dashed dark:border-dark-5 rounded-md mt-3 pt-4">
                                    <div class="flex flex-wrap px-4" id="image_preview">


                                    </div>
                                    <div class="px-4 pb-4 flex items-center cursor-pointer relative">
                                        <i data-feather="image" class="w-4 h-4 mr-2"></i> <span class="text-theme-1 dark:text-theme-10 mr-1 custom-file-label">Upload a file</span> or drag and drop
                                        <input type="file" name="image[]" id="upload_file" class="w-full h-full top-0 left-0 absolute opacity-0" onchange="preview_image();" multiple>
                                    </div>
                                </div>
                            </div>
                            <div class=" text-right mt-5">
                                <button type="button" class="button w-24 border dark:border-dark-5 text-gray-700 dark:text-gray-300 mr-1">Cancel</button>
                                <button type="button" class="button w-24 bg-theme-1 text-white">Save</button>
                            </div>




                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('form').ajaxForm(function() {
                alert("Uploaded SuccessFully");
            });
        });

        function preview_image() {
            var total_file = document.getElementById("upload_file").files.length;

            for (var i = 0; i < total_file; i++) {
                var name = event.target.files[i].name;
                var newName = name.split(' ').join('');
                console.log(newName);
                $('#image_preview').append(`
                                    <div id="` + newName + `" class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                        <img class="rounded-md" alt="Midone Tailwind HTML Admin Template" src="` + URL.createObjectURL(event.target.files[i]) + `">   
                                        <a href="#" id="removeImage` + newName + `" class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-theme-6 right-0 top-0 -mr-2 -mt-2"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x w-4 h-4"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg> </a>
                                        </div>
                                    `);

            }

            document.getElementById("removeImage" + newName).addEventListener("click", function() {
                var element = document.getElementById(newName);
                var imagePreview = document.getElementById(newName);
                imagePreview.scrollIntoView();
                element.parentNode.removeChild(element);

            });
        }
    </script>
    <?= $this->load->view('partial/script') ?>
</body>

</html>