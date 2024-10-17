const db = require('./db');
const { faker } = require('@faker-js/faker');

function seedUsers() {
    const users = [];

    for (let i = 0; i < 5; i++) {
        users.push([
            faker.person.firstName(),
            faker.internet.userName(),
            faker.internet.email(),
            faker.phone.number(),
            faker.internet.url(),
            faker.company.name(),
        ]);
    }

    // Check the structure of users array for debugging
    console.log(users); // This will show you the generated data

    const sql = 'INSERT INTO users (name, username, email, phone_no, website, company_name) VALUES ?';

    db.query(sql, [users], (error, result) => {
        if (error) {
            console.error('Error in seeding:', error.message); // Log the actual error message
        } else {
            console.log('Seeding completed successfully');
        }
        db.end();
    });
}

seedUsers();