@Library('automatic-updates') _

pipeline {
    agent any
    stages {
        stage('Demo') {
            steps {
                script {
                  echo 'Hello, world'
                  checkComposerSecurityUpdates()
                }
            }
        }
    }
}
