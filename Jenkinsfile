@Library('automatic-updates') _

pipeline {
    agent any
    stages {
        stage('Setup') {
            steps {
                script {
                    setup()
                }
            }
        }
        stage('Composer security check') {
            steps {
                script {
                  checkComposerSecurityUpdates()
                }
            }
        }
        stage('Drush security check') {
            steps {
                script {
                  checkDrushSecurityUpdates()
                }
            }
        }
        stage('Commit') {
            steps {
                script {
                  commit()
                }
            }
        }
    }
}
