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

const numberFormat = new Intl.NumberFormat('vi-VN', {
    style: 'currency',
    currency: 'VND',
});

var api = 'http://localhost/chiasenhanluc/Company/getDetailArticleCompany&ID=' + id;
const postTitle = document.querySelector('.post__title');
const postNameFields = document.querySelector('.post__name-field');
const postNameCompany = document.querySelector('.post__name-company');
const postAmountRecruimented = document.querySelector('.post__amount-recruitmented');
const postCity = document.querySelector('.post__city p');
const postIntroduce = document.querySelector('.post__introduce p');
const postDescJobText = document.querySelector('.post__desc-job-text p');
const postDescJobPosition = document.querySelector('.post__desc-job-position');
const postDescJobSalary = document.querySelector('.post__desc-job-salary');
const postDescJobTimeWork = document.querySelector('.post__desc-job-time-work');
const postDescJobRequirement = document.querySelector('.post__desc-job-request-requirement');
const postDescJobExperience = document.querySelector('.post__desc-job-request-experience');
const postDate = document.querySelector('.post-date');
const interested = document.querySelector('.post__bottom--Interested');

fetch(api)
    .then(function(response) {
        return response.json();
    })
    .then(function(posts) {
        posts.forEach(post => {
            if (post.ID === id) {
                postTitle.innerText = post.title;
                postNameFields.innerText = post.nameField;
                postNameCompany.innerText = post.name;
                postAmountRecruimented.innerText = `Số lượng nhân sự: ${post.amountRecruitment}/${post.amountRecruitmented}`;
                postCity.innerText = post.city;
                postDate.innerText = `Date Post: ` + post.datePost;
                postIntroduce.innerText = post.introduce;
                postDescJobText.innerText = post.description.split('<br>').join(' ');
                postDescJobPosition.innerText = 'Position: ' + post.position;
                postDescJobSalary.innerText = `Salary: ${numberFormat.format(post.fromSalary)} - ${numberFormat.format(post.toSalary)}`;
                postDescJobTimeWork.innerText = 'Time Work: ' + post.timeWork;
                postDescJobRequirement.innerText = post.requirement;
                postDescJobExperience.innerText = 'Experience: ' + post.experience + ' Years';

                if (post.amountRecruitment == post.amountRecruitmented) {
                    interested.classList.add('post__disabled');
                } else {
                    if (document.querySelector('.post__disabled'))
                        interested.classList.remove('post__disabled');
                }
                return 0;
            }
        });
    })