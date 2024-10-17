const express = require('express');
const router = express.Router();
const db = require('../config/db');


router.get('/api/user/:user_id/projects', function(req, res) {
  const user_id = req.params.user_id;


  db.query('SELECT * FROM users WHERE id = ?', [user_id], (err, users) => {
    if (err) {
      console.error('Error fetching user:', err.message);
      return res.status(500).send('Database query failed');
    }
    
db.query('SELECT * FROM projects WHERE user_id = ?', [user_id], (err, projects) => {
      if (err) {
        console.error('Error fetching projects:', err.message);
        return res.status(500).send('Error fetching projects');
      }

     
      res.json({
        user: users[0],   
        projects: projects 
      });
    });
  });
});




//get
router.get('/user/:user_id/projects', (req, res) => {
  const user_id = req.params.user_id;

  db.query('SELECT * FROM users WHERE id = ?', [user_id], (err, users) => {
      if (err) {
          console.error('Error fetching user:', err.message); 
          return res.status(500).send('Database query failed');
      }

      if (users.length === 0) {
          return res.status(404).send('User not found');
      }


      db.query('SELECT * FROM projects WHERE user_id = ?', [user_id], (err, projects) => {
          if (err) {
              console.error('Error fetching projects:'); 
              
          }
          
          res.render('indexproject', {
              user_id: user_id,
              projects: projects
          });
      });
  });
});


//create

router.get('/user/:user_id/project/create', (req, res) => {
    const user_id = req.params.user_id;
    
    res.render('createproject', {
      user_id: user_id
    });
  });


router.post('/user/:user_id/project/create', (req, res) => {
    const { title, body } = req.body;
    const user_id = req.params.user_id;
  
  
    const query = 'INSERT INTO projects (user_id, title, body) VALUES (?, ?, ?)';
    db.query(query, [user_id, title, body], (err, result) => {
      if (err) {
        console.log(err);
        return res.status(500).send('Database error');
      }
     res.redirect(`/user/${user_id}/projects`);
    });
  });

  //edit 

router.post("/user/:user_id/project/edit", (req, res) => {
    const { user_id } = req.params; 
    const { title, body } = req.body; 
  
   
    const query = "UPDATE projects SET title = ?, body = ? WHERE user_id= ?";
  

    db.query(query, [title, body, user_id], (err, result) => {
      if (err) {
        console.error(err);
        return res.status(500).send("Server error");
      }
  
   
      res.redirect(`/user/${user_id}/projects`);
    });
  });

//delete 

router.post("/user/:user_id/project/delete", (req, res) => {
    const { user_id } = req.params; 
  
  
    const query = "DELETE FROM projects WHERE user_id = ?";
  
   
    db.query(query, [user_id], (err, result) => {
      if (err) {
        console.error(err);
        return res.status(500).send("Server error");
      }
  
   
      res.redirect(`/user/${user_id}/projects`); 
    });
  });
   
  
  
  

  
  




module.exports = router;