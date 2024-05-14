









































































// $(document).ready(function(){
//     function showOriginalState() {
//         $('.loginHeader').show();
//         $('.signupHeader').show();
//         $('.loginHeader').removeClass('hidden');
//         $('.signupHeader').removeClass('hidden');
//         localStorage.removeItem('headerState');
//     }
//     var headerState = localStorage.getItem('headerState');
//     if (headerState) {
//         if (headerState === 'signup') {
//             // $('.loginHeader').hide();
//             // $('.signupHeader').show();
//             // $('.loginHeader').addClass('hidden');
//             $('.signup').css("display",'inline');
//             // $('.hidden').removeClass('loginHeader')
//             $('.login').css("display",'none');
//             $('.signupHeader').removeClass('hidden');
//         } else if (headerState === 'login') {
//             // $('.signupHeader').hide();
//             $('.login').css("display",'inline');
//             $('.signup').css("display",'none');
//             // $('.loginHeader').show();
//             // $('.signupHeader').addClass('hidden');
//             // $('.hidden').removeClass('signupHeader');
//             $('.loginHeader').removeClass('hidden');
//         }
//     }

//     $('.loginHeader').on('click', function () {
//         $(this).hide();
//         $('.signupHeader').show();
//         $('.loginHeader').addClass('hidden');
//         $('.signupHeader').removeClass('hidden');
//         localStorage.setItem('headerState', 'signup');
//     });

//     $('.signupHeader').on('click', function () {
//         $(this).hide();
        
//         $('.loginHeader').show();
//         $('.signupHeader').addClass('hidden');
//         $('.loginHeader').removeClass('hidden');
//         localStorage.setItem('headerState', 'login');
//     });

//     $('.homeButton').on('click', function () {
//         showOriginalState();
//     });
// });

