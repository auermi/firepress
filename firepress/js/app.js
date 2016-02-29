function fp_generate_table (fbURL) {
  var firebaseObject = new Firebase(fbURL)
  firebaseObject.on('value', function(snapshot) {
    var fp_data = snapshot.val()

    var fp_content_header = ''
    var fp_content = ''
    var fp_data_lead;

    // Loop through the leads object
    Object.keys(fp_data).forEach(function(k,i) {

      // Start the row
      fp_content += '<tr>'

      // Cache the lead object
      fp_data_lead = fp_data[k]

      // Cache the index for checking if this is the first element
      fp_data_index = i

      // Loop through the lead's properties
      Object.keys(fp_data_lead).forEach(function(k,i) {
        // We need the key to populate our header (only the first time)
        if (fp_data_index === 0) {
          fp_content_header += '<th>' + k + '</th>'
        }
        fp_content += '<td>' + fp_data_lead[k] + '</td>'
      })
      fp_content += '</tr>'
    })

    var fp_table = document.getElementById('fp_table')

    fp_table.innerHTML = fp_content
    fp_table.insertAdjacentHTML('afterbegin', fp_content_header)
  })
}

function FPSetGeneratorListener () {
  return function() {
    fp_generate_table(FPURLInput.value)
  }
}
document.addEventListener("DOMContentLoaded", function(event) {
  // Input field reference
  var FPURLInput = document.getElementById('FPURLInput')
  // 'Generate' button reference
  var FPURLSubmit = document.getElementById('FPURLSubmit')
  // When you hit 'Generate' query the url
  FPURLSubmit.onclick = FPSetGeneratorListener()
})
