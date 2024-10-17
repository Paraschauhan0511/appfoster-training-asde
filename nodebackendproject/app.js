var express = require('express');
var path = require('path');
var cookieParser = require('cookie-parser');
var logger = require('morgan');
var exphbs = require('express-handlebars');

var db = require('./config/db'); 

var indexRouter = require('./routes/users');
 var projectIndexRouter = require('./routes/project');

var app = express();


app.engine('handlebars', exphbs.engine({ defaultLayout: false })); 
app.set('view engine', 'handlebars');
app.set('views', path.join(__dirname, 'views'));

app.use(logger('dev'));
app.use(express.json());
app.use(express.urlencoded({ extended: false }));
app.use(cookieParser());
app.use(express.static(path.join(__dirname, 'public')));

app.use(function(req, res, next) {
    req.db = db;
    next();
  });

//routes
app.use('/', indexRouter);
 app.use('/', projectIndexRouter);

module.exports = app;
