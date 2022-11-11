function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, '\\$&');
    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
}

var id = getParameterByName('id');

var api = './Personally/getDetailArticlePersonally&ID=' + id;
const postTitle = document.querySelector('.post__title p');
const postDate = document.querySelector('.post-date');
const postInfoAvt = document.querySelector('.post__info-avt img');
const postNameField = document.querySelector('.post__info-name-field');
const postCity = document.querySelector('.post__city p');
const personName = document.querySelector('.person-name');
const personGender = document.querySelector('.person-gender');
const personWorkTime = document.querySelector('.person-work-time');
const personPosition = document.querySelector('.person-position');
const personExperience = document.querySelector('.person-experience');
const personIntroduce = document.querySelector('.person-introduce');
const personDescription = document.querySelector('.person-description');

fetch(api)
    .then(function(response) {
        return response.json();
    })
    .then(function(posts) {
        posts.forEach(post => {
            if (post.ID === id)
            {
                postTitle.innerText = post.title;
                postDate.innerText = 'Date Post: ' + post.datePost;
                postInfoAvt.setAttribute("src", post.image);
                postNameField.innerText = post.nameField;
                postCity.innerText = post.city;
                personName.innerText = post.name;
                personGender.innerText = post.gender;
                personWorkTime.innerText = post.timeWork;
                personPosition.innerText = post.position;
                personExperience.innerText = post.experience;
                personIntroduce.innerText = post.introduce;
                personDescription.innerText = post.description;
            }
        });
    });