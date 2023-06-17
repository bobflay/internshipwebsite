<template>
    <div class="container">
      <div class="card">
        <div class="card-body">
          <h2 class="card-title no-select">{{ question }}</h2>
          <ul class="list-group">
            <li v-for="(option, index) in options" :key="index" class="list-group-item">
              <div class="form-check">
                <input class="form-check-input" type="radio" v-model="selectedOption" :value="option" :id="`option-${index}`">
                <label class="form-check-label" :for="`option-${index}`">{{ option }}</label>
              </div>
            </li>
          </ul>
          <button class="btn btn-primary mt-3" @click="submitAnswer">Submit</button>
          <div v-if="showTimer" class="text-muted mt-3">
            Time remaining: {{ formatTimeRemaining }}
          </div>
        </div>
      </div>
      <div v-if="showCamera" class="mt-3">
        <video ref="video" autoplay></video>
        <button class="btn btn-danger mt-2" @click="stopRecording">Stop Recording</button>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        question: 'What is the capital of France?',
        options: ['Paris', 'London', 'Berlin', 'Rome'],
        selectedOption: null,
        result: null,
        timerDuration: 60, // Time in seconds
        startTime: null,
        showCamera: false,
        mediaRecorder: null,
        recordedBlobs: []
      };
    },
    computed: {
      showTimer() {
        return this.startTime !== null;
      },
      timeRemaining() {
        if (this.startTime === null) {
          return 0;
        }
        const elapsedSeconds = Math.floor((Date.now() - this.startTime) / 1000);
        return Math.max(this.timerDuration - elapsedSeconds, 0);
      },
      formatTimeRemaining() {
        const minutes = Math.floor(this.timeRemaining / 60);
        const seconds = this.timeRemaining % 60;
        return `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
      }
    },
    mounted() {
      this.startTimer();
    },
    methods: {
      startTimer() {
        this.startTime = Date.now();
        setTimeout(() => {
          this.startRecording();
        }, 5000); // Delay recording start by 5 seconds
      },
      startRecording() {
        navigator.mediaDevices.getUserMedia({ video: true })
          .then(stream => {
            this.showCamera = true;
            const videoElement = this.$refs.video;
            videoElement.srcObject = stream;
            this.mediaRecorder = new MediaRecorder(stream);
            this.mediaRecorder.ondataavailable = event => {
              if (event.data && event.data.size > 0) {
                this.recordedBlobs.push(event.data);
              }
            };
            this.mediaRecorder.start();
          })
          .catch(error => {
            console.error('Error accessing camera:', error);
          });
      },
      stopRecording() {
        if (this.mediaRecorder && this.mediaRecorder.state !== 'inactive') {
          this.mediaRecorder.stop();
        }
      },
      submitAnswer() {
        // Check answer and show result
        if (this.selectedOption === 'Paris') {
          // Correct answer
          this.showResult('Correct!', true);
        } else {
          // Incorrect answer
          this.showResult('Incorrect!', false);
        }
  
        // Move to the next question
        // Implement your logic here
  
        // Stop video recording
        this.stopRecording();
      },
      showResult(message, success) {
        this.result = { message, success };
      }
    },
    beforeDestroy() {
      if (this.mediaRecorder && this.mediaRecorder.state !== 'inactive') {
        this.mediaRecorder.stop();
      }
    }
  };
  </script>
  
  <style scoped>
  .card {
    width: 400px;
    margin: auto;
    margin-top: 50px;
    padding: 20px;
  }
  
  .no-select {
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
  }
  </style>
  