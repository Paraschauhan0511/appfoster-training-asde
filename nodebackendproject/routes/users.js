var express = require('express');
var router = express.Router();

/* GET users listing. */
const db = require('../config/db'); // Your MySQL database connection

// Route to fetch all users from the database
router.get('/api/users', function(req, res) {
  const sql = 'SELECT * FROM users';

  db.query(sql, (error, results) => {
    if (error) {
      return res.status(500).json({ message: 'Internal Server Error' }); 
    }

    res.json(results); 
  });
});

//get
router.get('/', function(req, res, next) {
  const sql = 'SELECT * FROM users';

  db.query(sql, (error, results) => {
    if (error) {
      console.error('Error fetching users:');
    }
    res.render('indexuser', { users: results });
  });
});

//create route
router.get('/create', function(req, res, next){
  res.render('createuser')
})

//create post route
router.post('/create', function(req, res) {
  const { name, username, email, phone_no, website, company_name } = req.body;

  const sql = 'INSERT INTO users (name, username, email, phone_no, website, company_name) VALUES(?,?,?,?,?,?)';


  db.query(sql, [name, username, email, phone_no, website, company_name], (error, result) => {
    if (error) {
      console.error('Error inserting user');
     
    }

    const fetchUsersSQL = 'SELECT * FROM users';
    db.query(fetchUsersSQL, (err, rows) => {
      if (err) {
        console.error('Error fetching users');
      }
       res.render('indexuser', { users: rows });
    });
  });
});

//edit
router.post('/update/:id', function(req, res) {
  const { name, username, email, phone_no, website, company_name } = req.body;
  const id = req.params.id;

  const sql = 'UPDATE users SET name = ?, username = ?, email = ?, phone_no = ?, website = ?, company_name = ? WHERE id = ?';

  db.query(sql, [name, username, email, phone_no, website, company_name, id], (error, result) => {
      if (error) {
          console.error('Error updating user');
         
      }

      const fetchUsersSQL = 'SELECT * FROM users';
      db.query(fetchUsersSQL, (err, rows) => {
          if (err) {
              console.error('Error fetching users');
            
          }
          res.render('indexuser', { users: rows });
      });
  });
});
//delete
router.post('/delete/:id', function(req, res) {
  const id = req.params.id;
  const sql = 'DELETE FROM users WHERE id = ?';
  
  db.query(sql, [id], (error, result) => {
      if (error) {
          console.error('Error deleting user');
         
      }
      
      const fetchUsersSQL = 'SELECT * FROM users';
      db.query(fetchUsersSQL, (err, rows) => {
          if (err) {
              console.error('Error fetching users');
            
          }
          res.render('indexuser', { users: rows });
      });
  });
});


router.get('/', function(req, res, next) {
  res.render('indexuser');
});

module.exports = router;
