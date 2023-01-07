@Library('automatic-updates')_

pipeline {
    agent any
    stages {
        stage('Demo') {
            steps {
                echo 'Hello, world'

                checkComposerSecurityUpdates
            }
        }
    }
}
