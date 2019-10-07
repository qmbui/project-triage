var patientTriageApp = new Vue({
  el: '#patientTriageApp',
  data: {
    patient: {}
  },
  methods: {
    handleSubmit() {
      // TODO: Add the correct date via Javascript before posting

       fetch(url, {
         method:'post',
         body: JSON.stringify(this.patient)
         headers: {
           "Content-Type": "application/json; charset=utf-8"
         }
        })
       .then( ... )
       waitingApp.patients.push(this.patient);
       this.handleReset();
    },
    handleReset() {
      this.patient = {
        patientGuid: '',
        firstName: '',
        lastName: '',
        dob: '',
        sexAtBirth: '',
        visitDescription: '',
        // visitDateUtc
        priority: 'low'
      }
    }
  },
  created() {
    this.handleReset();
  }
});
