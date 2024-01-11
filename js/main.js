document.getElementById('iconMenu').addEventListener('click', openMenu);
document.getElementById('burgerMenu').querySelector('.fa-times').addEventListener('click', toggleMenu);

function openMenu() {
    document.getElementById('burgerMenu').classList.remove('hidden');
    document.getElementById('iconMenu').classList.add('hidden');
}

function toggleMenu() {
    document.getElementById('burgerMenu').classList.add('hidden');
    document.getElementById('iconMenu').classList.remove('hidden');
}
document.getElementById('iconMenu').addEventListener('click', openMenu);
document.getElementById('burgerMenu').querySelector('.fa-times').addEventListener('click', toggleMenu);

function openMenu() {
    document.getElementById('burgerMenu').classList.remove('hidden');
    document.getElementById('iconMenu').classList.add('hidden');
}

function toggleMenu() {
    document.getElementById('burgerMenu').classList.add('hidden');
    document.getElementById('iconMenu').classList.remove('hidden');
}
// Catégorie     
function showAddCategoryPopup() {
    document.getElementById('addCategoryPopup').style.display = 'block';
}

function closeAddCategoryPopup() {
    document.getElementById('addCategoryPopup').style.display = 'none';
}

function showEditCategoryPopup(categoryId, categoryName) {
document.getElementById('editCategoryPopup_' + categoryId).style.display = 'block';

document.getElementById('editCategoryName_' + categoryId).value = categoryName;
}

function closeEditCategoryPopup(categoryId) {

document.getElementById('editCategoryPopup_' + categoryId).style.display = 'none';
}

function deleteCategory(categoryId) {}

function submitEditCategoryForm(categoryId) {
// Récupérez les valeurs du formulaire d'édition
var newCategoryName = document.getElementById('editCategoryName_' + categoryId).value;

// Créez un formulaire dynamique
var form = document.createElement('form');
form.action = '../views/catégories.php';
form.method = 'POST';

// Ajoutez les champs cachés pour l'ID de la catégorie, le nouveau nom et l'indication d'édition
var editCategoryIdInput = document.createElement('input');
editCategoryIdInput.type = 'hidden';
editCategoryIdInput.name = 'editCategoryId';
editCategoryIdInput.value = categoryId;
form.appendChild(editCategoryIdInput);

var editCategoryNameInput = document.createElement('input');
editCategoryNameInput.type = 'hidden';
editCategoryNameInput.name = 'editCategoryName';
editCategoryNameInput.value = newCategoryName;
form.appendChild(editCategoryNameInput);

var editCategoryInput = document.createElement('input');
editCategoryInput.type = 'hidden';
editCategoryInput.name = 'editCategory';
editCategoryInput.value = '1';
form.appendChild(editCategoryInput);

// Ajoutez le formulaire au corps du document
document.body.appendChild(form);

// Soumettez le formulaire
form.submit();


}


//tags


function showAddTagPopup() {
    document.getElementById('addTagPopup').style.display = 'block';
}

function closeAddTagPopup() {
    document.getElementById('addTagPopup').style.display = 'none';
}

function showEditTagPopup(tagId, tagName) {
    document.getElementById('editTagPopup_' + tagId).style.display = 'block';
    document.getElementById('editTagName_' + tagId).value = tagName;
}

function closeEditTagPopup(tagId) {
    document.getElementById('editTagPopup_' + tagId).style.display = 'none';
}

function submitEditTagForm(tagId) {
var newTagName = document.getElementById('editTagName_' + tagId).value;
var form = document.createElement('form');
form.action = 'tags.php'; 
form.method = 'POST';
var editTagIdInput = document.createElement('input');
editTagIdInput.type = 'hidden';
editTagIdInput.name = 'editTagId';
editTagIdInput.value = tagId;
form.appendChild(editTagIdInput);

var editTagNameInput = document.createElement('input');
editTagNameInput.type = 'hidden';
editTagNameInput.name = 'editTagName';
editTagNameInput.value = newTagName;
form.appendChild(editTagNameInput);

var editTagInput = document.createElement('input');
editTagInput.type = 'hidden';
editTagInput.name = 'editTag';
editTagInput.value = '1';
form.appendChild(editTagInput);
document.body.appendChild(form);

form.submit();
}


function deleteTag(tagId) {
    if (confirm("Are you sure you want to delete this tag?")) {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                window.location.reload();
            }
        };
        xhr.open("POST", "tags.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("deleteTag=1&tagId=" + tagId);
    }
}
