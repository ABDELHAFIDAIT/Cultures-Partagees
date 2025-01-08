const optionAdminStatistics = document.querySelector('#admin-statistics');
const optionAdminAuthors = document.querySelector('#admin-authors');
const optionAdminArticles = document.querySelector('#admin-articles');
const optionAdminCategories = document.querySelector('#admin-categories');
const optionAdminProfile = document.querySelector('#admin-profile');
const optionAdminUsers = document.querySelector('#admin-users');
const optionAdminTags = document.querySelector('#admin-tags');
const optionAdminComments = document.querySelector('#admin-comments');


const manageAdminStatistics = document.querySelector('#admin-manage-statistics');
const manageAdminAuthors = document.querySelector('#admin-manage-authors');
const manageAdminArticles = document.querySelector('#admin-manage-articles');
const manageAdminCategories = document.querySelector('#admin-manage-categories');
const manageAdminProfile = document.querySelector('#admin-manage-profile');
const manageAdminUsers = document.querySelector('#admin-manage-users');
const manageAdminTags = document.querySelector('#admin-manage-tags');
const manageAdminComments = document.querySelector('#admin-manage-comments');


optionAdminComments.addEventListener('click', function() {
    optionAdminStatistics.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminAuthors.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminArticles.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminCategories.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminProfile.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminUsers.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminComments.classList.add('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminTags.classList.remove('bg-purple-700', 'border-r-4', 'border-white');

    manageAdminTags.style.display = 'none';
    manageAdminStatistics.style.display = 'none';
    manageAdminAuthors.style.display = 'none';
    manageAdminArticles.style.display = 'none';
    manageAdminCategories.style.display = 'none';
    manageAdminProfile.style.display = 'none';
    manageAdminUsers.style.display = 'none';
    manageAdminComments.style.display = 'block';
});


optionAdminStatistics.addEventListener('click', function() {
    optionAdminStatistics.classList.add('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminAuthors.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminArticles.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminCategories.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminProfile.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminUsers.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminComments.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminTags.classList.remove('bg-purple-700', 'border-r-4', 'border-white');

    manageAdminTags.style.display = 'none';
    manageAdminStatistics.style.display = 'block';
    manageAdminAuthors.style.display = 'none';
    manageAdminArticles.style.display = 'none';
    manageAdminCategories.style.display = 'none';
    manageAdminProfile.style.display = 'none';
    manageAdminUsers.style.display = 'none';
    manageAdminComments.style.display = 'none';
});

optionAdminAuthors.addEventListener('click', function() {
    optionAdminAuthors.classList.add('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminStatistics.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminArticles.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminCategories.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminProfile.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminUsers.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminComments.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminTags.classList.remove('bg-purple-700', 'border-r-4', 'border-white');

    manageAdminTags.style.display = 'none';
    manageAdminStatistics.style.display = 'none';
    manageAdminAuthors.style.display = 'block';
    manageAdminArticles.style.display = 'none';
    manageAdminCategories.style.display = 'none';
    manageAdminProfile.style.display = 'none';
    manageAdminUsers.style.display = 'none';
    manageAdminComments.style.display = 'none';
});

optionAdminArticles.addEventListener('click', function() {
    optionAdminArticles.classList.add('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminTags.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminStatistics.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminAuthors.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminCategories.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminProfile.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminUsers.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminComments.classList.remove('bg-purple-700', 'border-r-4', 'border-white');

    manageAdminTags.style.display = 'none';
    manageAdminStatistics.style.display = 'none';
    manageAdminAuthors.style.display = 'none';
    manageAdminArticles.style.display = 'block';
    manageAdminCategories.style.display = 'none';
    manageAdminProfile.style.display = 'none';
    manageAdminUsers.style.display = 'none';
    manageAdminComments.style.display = 'none';
});

optionAdminCategories.addEventListener('click', function() {
    optionAdminCategories.classList.add('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminTags.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminStatistics.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminAuthors.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminArticles.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminProfile.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminUsers.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminComments.classList.remove('bg-purple-700', 'border-r-4', 'border-white');

    manageAdminTags.style.display = 'none';
    manageAdminStatistics.style.display = 'none';
    manageAdminAuthors.style.display = 'none';
    manageAdminArticles.style.display = 'none';
    manageAdminCategories.style.display = 'block';
    manageAdminProfile.style.display = 'none';
    manageAdminUsers.style.display = 'none';
    manageAdminComments.style.display = 'none';
});

optionAdminProfile.addEventListener('click', function() {
    optionAdminProfile.classList.add('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminTags.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminStatistics.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminAuthors.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminArticles.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminCategories.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminUsers.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminComments.classList.remove('bg-purple-700', 'border-r-4', 'border-white');

    manageAdminTags.style.display = 'none';
    manageAdminStatistics.style.display = 'none';
    manageAdminAuthors.style.display = 'none';
    manageAdminArticles.style.display = 'none';
    manageAdminCategories.style.display = 'none';
    manageAdminProfile.style.display = 'block';
    manageAdminUsers.style.display = 'none';
    manageAdminComments.style.display = 'none';
});

optionAdminUsers.addEventListener('click', function() {
    optionAdminUsers.classList.add('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminTags.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminStatistics.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminAuthors.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminArticles.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminCategories.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminProfile.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminComments.classList.remove('bg-purple-700', 'border-r-4', 'border-white');

    manageAdminTags.style.display = 'none';
    manageAdminStatistics.style.display = 'none';
    manageAdminAuthors.style.display = 'none';
    manageAdminArticles.style.display = 'none';
    manageAdminCategories.style.display = 'none';
    manageAdminProfile.style.display = 'none';
    manageAdminComments.style.display = 'none';
    manageAdminUsers.style.display = 'block';
});

optionAdminTags.addEventListener('click', function() {
    optionAdminTags.classList.add('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminUsers.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminStatistics.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminAuthors.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminArticles.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminCategories.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminProfile.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminComments.classList.remove('bg-purple-700', 'border-r-4', 'border-white');

    manageAdminStatistics.style.display = 'none';
    manageAdminAuthors.style.display = 'none';
    manageAdminArticles.style.display = 'none';
    manageAdminCategories.style.display = 'none';
    manageAdminProfile.style.display = 'none';
    manageAdminUsers.style.display = 'none';
    manageAdminComments.style.display = 'none';
    manageAdminTags.style.display = 'block';
});


//================================================================================================


const cancelButtonCategory = document.querySelector('#cancel-cat');
const CategoryFormContainer = document.querySelector('#add-cat-form');
const openCategoryForm = document.querySelector('#open-add-cat');
const CategoryForm = document.querySelector('#addCategoryForm');

cancelButtonCategory.addEventListener('click', function() {
    CategoryFormContainer.style.display = 'none';
    CategoryForm.reset();
});

openCategoryForm.addEventListener('click', function() {
    CategoryFormContainer.style.display = 'flex';
});


const cancelButtonTag = document.querySelector('#cancel-tag');
const TagFormContainer = document.querySelector('#add-tag-form');
const openTagForm = document.querySelector('#open-add-tag');
const TagForm = document.querySelector('#addTagForm');

cancelButtonTag.addEventListener('click', function() {
    TagFormContainer.style.display = 'none';
    TagForm.reset();
});

openTagForm.addEventListener('click', function() {
    TagFormContainer.style.display = 'flex';
});