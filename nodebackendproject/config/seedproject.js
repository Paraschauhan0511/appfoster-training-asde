const db = require('./db'); 
const { faker } = require('@faker-js/faker');

function seedProjects() {
   
    getExistingUserIds(function(userIds) {
        const projects = [];

        for (let i = 0; i < 5; i++) {
            const randomUserId = userIds[Math.floor(Math.random() * userIds.length)];
            projects.push([
                faker.lorem.sentence(), 
                faker.lorem.paragraph(), 
                randomUserId 
            ]);
        }

        const sql = 'INSERT INTO projects (title, body, user_id) VALUES ?';

        db.query(sql, [projects], (error, result) => {
            if (error) {
                console.error('Error in seeding:',error); 
                return;
            }

            console.log('Seeding completed successfully',);
            db.end(); 
        });
    });
}


function getExistingUserIds(callback) {
    db.query('SELECT id FROM users', (error, results) => {
        if (error) {
            console.error('Error fetching user IDs:', error.message);
            return;
        }
        const userIds = results.map(user => user.id);
        callback(userIds); 
    });
}

seedProjects();