<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script defer type="text/javascript" src="../public/js/author.js"></script>
    <title>MyWiki</title>
</head>

<body>
    <?php include_once('../app/views/inc/authornav.php');
    ?>
    <h1 class="hidden" id="authorid"><?= $_SESSION['id']; ?></h1>
    <section class="max-w-4xl p-6 mx-auto bg-black rounded-md shadow-md dark:bg-gray-800 mt-5">
        <h1 class="text-xl font-bold text-white capitalize dark:text-white">add wiki's</h1>
        <div>
            <div class="flex flex-col">
                <div>
                    <label class="text-white dark:text-gray-200" for="emailAddress">Title</label>
                    <input id="wikititle" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                </div>
                <div>
                    <label class="text-white dark:text-gray-200" for="passwordConfirmation"> article </label>
                    <input id="wikiarticle" type="textarea" class="block w-full px-4 py-10 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                </div>
                <div>
                    <label class="text-white dark:text-gray-200">Select Category</label>
                    <select id="selectcat" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">

                    </select>
                </div>
                <div>
                    <input class="hidden" type="text" value="" id="idhere">
                    <label class="block text-sm font-medium text-white">
                        Image
                    </label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-700 border-dashed rounded-md bg-gray-600">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-white" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label for="file-upload" class="relative cursor-pointer  rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                    <span class="">Upload a file</span>
                                    <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                </label>
                                <p class="pl-1 text-white">or drag and drop</p>
                            </div>
                            <p class="text-xs text-white">
                                PNG, JPG, GIF up to 10MB
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-3 w-[100%]">
                <div class="flex mt-3 flex-row justify-center items-center justify-between w-[100%]">
                    <button id="opentagdiv" class="px-6 py-2 leading-5 text-black transition-colors duration-200 transform bg-white rounded-md hover:bg-blue-700 focus:outline-none focus:bg-gray-600">Add Tags</button>
                    <button id="addwiki" class="px-6 py-2 leading-5 text-black transition-colors duration-200 transform bg-white rounded-md hover:bg-blue-700 focus:outline-none focus:bg-gray-600">Publish</button>
                </div>
                <div id="tagshere2" class="w-[100%] py-6 bg-white rounded-xl">
                    <button id="confirmbtn" class="hidden p-4 bg-green-200 ml-2 mb-2 rounded-xl float-right mr-2">Confirm</button>
                </div>
                <div id="tagspop" class="hidden w-[100%]  flex flex-col md:flex-row  rounded-xl shadow-lg p-3  mx-auto border border-white bg-white">
                    <div class="w-full md:w-3/3 bg-white flex flex-col space-y-2 p-3">
                        <div class="w-[100%] mt-2 ml-4"><button id="closetagdiv" class="float-right">
                                <svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" viewBox="0 0 448 512">
                                    <path fill="#1f59e0" d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm79 143c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
                                </svg></button>

                        </div>
                        <h3 class="font-black text-gray-800 md:text-3xl text-xl">Choose tags :</h3>
                        <div class="flex flex-wrap " id="tagshere">


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="max-w-4xl p-6 mx-auto bg-black flex flex-col gap-2 items-center rounded-md shadow-md dark:bg-gray-800 mt-5">
        <H1 class="font-bold text-white text-[60px] ">My Wikis</H1>
        <?php
        require_once('../app/controllers/Wikis.php');
        $wiki = new Wikis();
        $id = $_SESSION['id'];
        $data = $wiki->display($id);
        foreach ($data as $wiki) {
            $img = basename($wiki[7]);

            echo "
            <div class='w-[80%]'>
                <div class='w-[100%]'>
                    <div class='bg-white shadow-md border border-gray-200 rounded-lg  dark:bg-gray-800 dark:border-gray-700'>
                        <a href='#'>
                            <img class='rounded-t-lg' src='../public/img/$img' alt=''>
                            <input class='hidden imgs' value='$img'>
                        </a>
                        <div class='p-5'>
                            <a href='#'>
                                <h5 class='text-gray-900 font-bold text-2xl tracking-tight mb-2 dark:text-white title'>$wiki[1]</h5>
                                <h5 class='hidden text-gray-900 font-bold text-2xl tracking-tight mb-2 dark:text-white wikiid'>$wiki[0]</h5>
                                <p class='hidden wikiarticle'>$wiki[2]</p>
                            </a>
                            <p class='font-normal text-gray-700 mb-3 dark:text-gray-400'>$wiki[3]</p>
                        </div>
                        <div class='flex w-[95%] justify-between mb-2 ml-2 mt-5'>    
                        <button value='$wiki[0]' onclick='deletewiki()' class='deletewiki'><svg xmlns='http://www.w3.org/2000/svg' height='20' width='20' viewBox='0 0 448 512'><path fill='#e3e3e3' d='M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z'/></svg></button>
                        <button class='updatewiki' onclick='updatewiki()'><svg xmlns='http://www.w3.org/2000/svg' height='20' width='20' viewBox='0 0 512 512'><path fill='#bdbdbd' d='M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z'/></svg></button>
                        </div>
                    </div>
                </div>
            </div>
            ";
        }
        ?>
    </section>

    <form method="post" action="<?php echo URLROOT; ?>Wikis/updateWiki" id="editwiki" class="w-[50%] hidden rounded-xl fixed bottom-[25%] z-50 right-[25%] border border-white-500 p-6 bg-gray-900">
        <div class="w-[80%] mt-2 ml-4"><button id="closewiki" class="float-right">
                <svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" viewBox="0 0 448 512">
                    <path fill="#1f59e0" d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm79 143c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
                </svg></button>
        </div>
        <h2 class="text-2xl pb-3 text-white font-semibold">
            Edit Wiki</h2>
        <div>
            <div class="flex flex-col  text-white mb-3">
                <label for="name">Edit Title</label>
                <input type="text" name="name" id="editwikititle" class="px-3 py-2 bg-gray-800 border border-gray-900 focus:border-white-500 focus:outline-none focus:bg-gray-800 focus:text-white-500" autocomplete="off">
                <input type="text" name="img" id="wikiimg" class="hidden px-3 py-2 bg-gray-800 border border-gray-900 focus:border-white-500 focus:outline-none focus:bg-gray-800 focus:text-white-500" autocomplete="off">
                <input type="text" name="id" id="editwikiid" class="hidden px-3 py-2 bg-gray-800 border border-gray-900 focus:border-white-500 focus:outline-none focus:bg-gray-800 focus:text-white-500" autocomplete="off">
                <input type="text" name="userid" id="" value="<?= $_SESSION['id'] ?>" class="hidden px-3 py-2 bg-gray-800 border border-gray-900 focus:border-white-500 focus:outline-none focus:bg-gray-800 focus:text-white-500" autocomplete="off">
            </div>
            <div class="flex flex-col  text-white mb-3">
                <label for="name">Edit Article</label>
                <input type="textarea" name="article" id="editarticle" class="px-3 py-4 bg-gray-800 border border-gray-900 focus:border-white-500 focus:outline-none focus:bg-gray-800 focus:text-white-500" autocomplete="off">
            </div>
            <span class="h-[10%] rounded-full" id="putimghere">

            </span>
            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-700 border-dashed rounded-md bg-gray-600">
                <div class="space-y-1 text-center">
                    <svg class="mx-auto h-12 w-12 text-white" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <div class="flex text-sm text-gray-600">
                        <label for="file-upload" class="relative cursor-pointer  rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                            <span class="">Upload a file</span>
                            <input id="imagehere" value="" name="file-upload" type="file" class="sr-only">
                        </label>
                        <p class="pl-1 text-white">or drag and drop</p>
                    </div>
                    <p class="text-xs text-white">
                        PNG, JPG, GIF up to 10MB
                    </p>
                </div>
            </div>
            <button class="bg-gray-900 border border-white-500 px-4 py-2 text-white rounded-xl text-xl cursor-pointer mt-2 edittags">Edit tags</button>
        </div>
        <div class="w-full text-white pt-3">
            <button type="submit" class="w-full bg-gray-900 border border-white-500 px-4 py-2 transition duration-50 focus:outline-none font-semibold hover:bg-white-500 hover:text-white text-xl cursor-pointer">
                Edit
            </button>
        </div>
    </form>
    <div class="w-[60%] hidden rounded-xl fixed bottom-[20%] z-50 right-[25%] border border-white-500 p-6 bg-gray-900 md:" id="edittagshere">
        <div class="w-[80%] mt-2 ml-4"><button id="closetag" class="float-right">
                <svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" viewBox="0 0 448 512">
                    <path fill="#1f59e0" d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm79 143c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
                </svg></button>
        </div>


        <div class="flex flex-col  " id="edittagshere">

            <div class="flex flex-col">
                <h1 class="font-bold text-white">
                    your Tags
                </h1>
                <div id="yourtagshere">

                </div>
            </div>
            <div class="flex flex-col">
                <h1 class="font-bold text-white">Choose the tags you wish to add</h1>
                <div>
                    <?php
                    require_once('../app/controllers/Tags.php');
                    $tag = new Tags();
                    $data = $tag->displayeditTags();
                    foreach ($data as $tag) {
                    ?>
                        <button class="p-4 bg-white ml-2 mb-2 text-black font-bold rounded-xl tagstoadd" value="<?= $tag[0] ?>"><?= $tag[1] ?></button>
                    <?php
                    }
                    ?>
                </div>
            </div>

            <button id="confirmtags" class="bg-green-200 p-4 rounded-xl">Confirm</button>
        </div>
    </div>


    <div id="tagsupdated" class="hidden w-[30%] fixed top-[25%] left-[30%] z-100 mx-auto">
        <div class="flex flex-col p-5 rounded-lg shadow bg-white">
            <div class="flex flex-col items-center text-center">
                <div class="inline-block p-4 bg-yellow-50 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" viewBox="0 0 512 512">
                        <path fill="#63E6BE" d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                    </svg>
                </div>
                <h2 class="mt-2 font-semibold text-gray-800">Tags Updated Succesfully</h2>
            </div>
        </div>
    </div>
    <div id="tagsremoved" class="hidden w-[30%] fixed top-[25%] left-[30%] z-100 mx-auto">
        <div class="flex flex-col p-5 rounded-lg shadow bg-white">
            <div class="flex flex-col items-center text-center">
                <div class="inline-block p-4 bg-yellow-50 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" viewBox="0 0 512 512">
                        <path fill="#63E6BE" d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                    </svg>
                </div>
                <h2 class="mt-2 font-semibold text-gray-800">Tags removed Succesfully</h2>
            </div>
        </div>
    </div>

</body>

</html>

<script>
    const id = document.querySelectorAll('.wikiid');
    const editwiki = document.getElementById('editwiki');
    const closewiki = document.getElementById('closewiki');
    var eidtid = 0;
    closewiki.addEventListener('click', e => {
        e.preventDefault();
        editwiki.classList.add('hidden');
    })
    let display = false;

    function updatewiki() {
        const updatewiki = document.querySelectorAll('.updatewiki');
        const title = document.querySelectorAll('.title');
        const article = document.querySelectorAll('.wikiarticle');
        const wikisid = document.querySelectorAll('.wikiid');
        const imgs = document.querySelectorAll('.imgs');
        const tagseditbtn = document.querySelectorAll('.edittags');
        let edittagshere = document.getElementById('edittagshere');

        for (let i = 0; i < updatewiki.length; i++) {
            updatewiki[i].addEventListener('click', e => {
                editwiki.classList.remove('hidden');
                document.getElementById('editwikititle').value = title[i].innerText;
                document.getElementById('editarticle').value = article[i].innerText;
                document.getElementById('editwikiid').value = wikisid[i].innerText;
                eidtid = document.getElementById('editwikiid').value;
                let test = imgs[i].value;
                document.getElementById('wikiimg').value = test;
                tagseditbtn[i].addEventListener('click', e => {
                    e.preventDefault();
                    edittagshere.classList.remove('hidden');
                    var formData = new FormData();
                    formData.append('id', eidtid);
                    const xhr = new XMLHttpRequest();
                    xhr.open('POST', 'http://localhost/Wiki-/Tags/displaywikitags', true);
                    xhr.onload = function() {
                        if (xhr.status == 200 && xhr.readyState == 4) {
                            let data = JSON.parse(xhr.response);

                            if (data != null && !display) {
                                for (let index = 0; index < data.length; index++) {
                                    document.getElementById("yourtagshere").innerHTML += `
                                <button class="p-4 bg-blue-200 ml-2 mb-2 rounded-xl edittagsbtn" onclick="editfunction()" value="${data[index][1]}">${data[index][3]}</button>
                                `;
                                }
                                display = true;
                            }
                            editfunction();
                        }
                    };
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    xhr.send(new URLSearchParams(formData));
                })
                document.getElementById('closetag').addEventListener('click', e => {
                    edittagshere.classList.add('hidden');
                })
            })
        }


    }

    function deletewiki() {
        const deletewiki = document.querySelectorAll('.deletewiki');
        for (let i = 0; i < deletewiki.length; i++) {
            deletewiki[i].addEventListener('click', e => {
                let wikiid = deletewiki[i].value;

                var formData = new FormData();
                formData.append('id', wikiid);
                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'http://localhost/Wiki-/Wikis/deletewiki', true);
                xhr.onload = function() {
                    if (xhr.status == 200 && xhr.readyState == 4) {

                    }
                };
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.send(new URLSearchParams(formData));
            })
        }
    }

    addwiki.addEventListener('click', wiki);

    function wiki() {
        let title = document.getElementById('wikititle').value;
        let desc = document.getElementById('wikiarticle').value;
        let img = document.getElementById('file-upload').value;
        let category = document.getElementById('selectcat').value;
        let authorid = document.getElementById('authorid').innerText;
        const tagids = document.querySelectorAll('.tagids');
        let dataID = [];
        for (let i = 0; i < tagids.length; i++) {
            if (!dataID[i]) {
                dataID[i] = [];
            }
            dataID[i].push(parseInt(tagids[i].value));
        }
        let arrayofID = JSON.stringify(dataID);
        var formData = new FormData();
        formData.append('title', title);
        formData.append('desc', desc);
        formData.append('img', img);
        formData.append('category', category);
        formData.append('authorid', authorid);
        if (dataID.length > 0) {
            formData.append('tagid', arrayofID);
        }
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'http://localhost/Wiki-/Wikis/insertwiki', true);
        xhr.onload = function() {
            if (xhr.status == 200 && xhr.readyState == 4) {
                document.getElementById("idhere").value = xhr.response;
                // window.location.search ='http://localhost/Wiki-/pages/author';
                location.reload();
            }
        };
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send(new URLSearchParams(formData));

    }
    let tagIDtoremove = [];
    let tagToadd = [];

    function editfunction() {
        const edittagsbtn = document.querySelectorAll('.edittagsbtn');
        const tagstoadd = document.querySelectorAll('.tagstoadd');

        for (let index = 0; index < tagstoadd.length; index++) {
            tagstoadd[index].addEventListener('click', (e) => {
                e.target.style.backgroundColor = 'blue';
                tagToadd.push(parseInt(e.target.value));
            });
        }
        for (let index = 0; index < edittagsbtn.length; index++) {
            edittagsbtn[index].addEventListener('click', (e) => {
                e.target.classList.add('hidden');
                console.log(e.target.value);
                tagIDtoremove.push(parseInt(e.target.value));
            });
        }
    }
    document.getElementById('confirmtags').addEventListener('click', e => {
        let remove = JSON.stringify(tagIDtoremove);
        let tagsupdated = document.getElementById('tagsupdated');
        let tagsremoved = document.getElementById('tagsremoved');
        var removeFormData = new FormData();
        removeFormData.append('id', eidtid);
        removeFormData.append('arrayofID', remove);
        const removeXHR = new XMLHttpRequest();
        removeXHR.open('POST', 'http://localhost/Wiki-/Tags/removetagsedit', true);
        removeXHR.onload = function() {
            if (removeXHR.status == 200 && removeXHR.readyState == 4) {
                tagsremoved.classList.remove('hidden');
                setTimeout(() => {
                    tagsremoved.classList.add('hidden');
                }, 2200);
            }
        };
        removeXHR.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        removeXHR.send(new URLSearchParams(removeFormData));
        if (tagToadd.length > 0) {
            let add = JSON.stringify(tagToadd);
            var addFormData = new FormData();
            addFormData.append('id', eidtid);
            addFormData.append('arrayofIDs', add);
            const addXHR = new XMLHttpRequest();
            addXHR.open('POST', 'http://localhost/Wiki-/Tags/addtagsedit', true);
            addXHR.onload = function() {
                if (addXHR.status == 200 && addXHR.readyState == 4) {
                    tagsupdated.classList.remove('hidden');
                    setTimeout(() => {
                        tagsupdated.classList.add('hidden');
                    }, 2200);
                }
            };
            addXHR.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            addXHR.send(new URLSearchParams(addFormData));
        }
    });
</script>