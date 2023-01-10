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
        stage('Composer security updates') {
            steps {
                script {
                    composerSecurityUpdates()
                }
            }
        }
        stage('Drush security updates') {
            steps {
                script {
                    drushSecurityUpdates()
                }
            }
        }
        stage('Commit') {
            steps {
                script {
                    commitChanges()
                }
            }
        }
    }
}
