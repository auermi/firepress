var firebase = new Firebase("https://signaturerepo.firebaseio.com/");

firebase.child('leads').on('value', function(snapshot) {
  console.log(snapshot.val());
});
