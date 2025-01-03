const optionAdminStatistics = document.querySelector('#admin-statistics');
const optionAdminAuthors = document.querySelector('#admin-authors');
const optionAdminArticles = document.querySelector('#admin-articles');
const optionAdminCategories = document.querySelector('#admin-categories');
const optionAdminProfile = document.querySelector('#admin-profile');
const optionAdminUsers = document.querySelector('#admin-users');


const manageAdminStatistics = document.querySelector('#admin-manage-statistics');
const manageAdminAuthors = document.querySelector('#admin-manage-authors');
const manageAdminArticles = document.querySelector('#admin-manage-articles');
const manageAdminCategories = document.querySelector('#admin-manage-categories');
const manageAdminProfile = document.querySelector('#admin-manage-profile');
const manageAdminUsers = document.querySelector('#admin-manage-users');


optionAdminStatistics.addEventListener('click', function() {
    optionAdminStatistics.classList.add('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminAuthors.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminArticles.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminCategories.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminProfile.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminUsers.classList.remove('bg-purple-700', 'border-r-4', 'border-white');

    manageAdminStatistics.style.display = 'block';
    manageAdminAuthors.style.display = 'none';
    manageAdminArticles.style.display = 'none';
    manageAdminCategories.style.display = 'none';
    manageAdminProfile.style.display = 'none';
    manageAdminUsers.style.display = 'none';
});

optionAdminAuthors.addEventListener('click', function() {
    optionAdminAuthors.classList.add('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminStatistics.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminArticles.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminCategories.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminProfile.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminUsers.classList.remove('bg-purple-700', 'border-r-4', 'border-white');

    manageAdminStatistics.style.display = 'none';
    manageAdminAuthors.style.display = 'block';
    manageAdminArticles.style.display = 'none';
    manageAdminCategories.style.display = 'none';
    manageAdminProfile.style.display = 'none';
    manageAdminUsers.style.display = 'none';
});

optionAdminArticles.addEventListener('click', function() {
    optionAdminArticles.classList.add('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminStatistics.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminAuthors.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminCategories.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminProfile.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminUsers.classList.remove('bg-purple-700', 'border-r-4', 'border-white');

    manageAdminStatistics.style.display = 'none';
    manageAdminAuthors.style.display = 'none';
    manageAdminArticles.style.display = 'block';
    manageAdminCategories.style.display = 'none';
    manageAdminProfile.style.display = 'none';
    manageAdminUsers.style.display = 'none';
});

optionAdminCategories.addEventListener('click', function() {
    optionAdminCategories.classList.add('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminStatistics.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminAuthors.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminArticles.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminProfile.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminUsers.classList.remove('bg-purple-700', 'border-r-4', 'border-white');

    manageAdminStatistics.style.display = 'none';
    manageAdminAuthors.style.display = 'none';
    manageAdminArticles.style.display = 'none';
    manageAdminCategories.style.display = 'block';
    manageAdminProfile.style.display = 'none';
    manageAdminUsers.style.display = 'none';
});

optionAdminProfile.addEventListener('click', function() {
    optionAdminProfile.classList.add('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminStatistics.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminAuthors.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminArticles.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminCategories.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminUsers.classList.remove('bg-purple-700', 'border-r-4', 'border-white');

    manageAdminStatistics.style.display = 'none';
    manageAdminAuthors.style.display = 'none';
    manageAdminArticles.style.display = 'none';
    manageAdminCategories.style.display = 'none';
    manageAdminProfile.style.display = 'block';
    manageAdminUsers.style.display = 'none';
});

optionAdminUsers.addEventListener('click', function() {
    optionAdminUsers.classList.add('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminStatistics.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminAuthors.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminArticles.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminCategories.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAdminProfile.classList.remove('bg-purple-700', 'border-r-4', 'border-white');

    manageAdminStatistics.style.display = 'none';
    manageAdminAuthors.style.display = 'none';
    manageAdminArticles.style.display = 'none';
    manageAdminCategories.style.display = 'none';
    manageAdminProfile.style.display = 'none';
    manageAdminUsers.style.display = 'block';
});


//================================================================================================


const cancelButton = document.querySelector('#cancel-cat');
const formContainer = document.querySelector('.fixed');
const openForm = document.querySelector('#open-add-cat');
const form = document.querySelector('#addCategoryForm');

cancelButton.addEventListener('click', function() {
    formContainer.style.display = 'none';
    form.reset();
});

openForm.addEventListener('click', function() {
    formContainer.style.display = 'flex';
});