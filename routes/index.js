var express = require('express');
var router = express.Router();
const userModel = require("./users");
const passport = require("passport");
// const upload = require("./multer");//posting the posts
//below two lines helps user to log in
const localStrategy = require("passport-local");
passport.use(new localStrategy(userModel.authenticate()));



/* GET home page. */

router.get('/', function(req, res, next) {
  res.render('landing', { title: 'Express' });
});
router.get('/index', function(req, res, next) {
  res.render('index', { title: 'Express' });
});


// router.get("/createuser", async function(req,res, next){
//   let createduser = await userModel.create({
//     username: 
//     password:
//     email:
//     fullname:

//   });
//   res.send(createduser);
// })


// router.get("/login", function(req, res,next){
//   // console.log(req.flash("error"));
//   res.render("login", {error: req.flash("error")});
// });
router.get('/login', function(req, res, next) {
  res.render('login',{error: req.flash("error")}); // Assuming your login page is named login.ejs
});
router.get('/products', function(req, res, next) {
  res.render('product',{error: req.flash("error")}); // Assuming your login page is named login.ejs
});
router.get('/cart', function(req, res, next) {
  res.render('cart'); // Assuming your login page is named login.ejs
});
router.get('/signup', function(req, res, next) {
  res.render('signup'); // Assuming your login page is named login.ejs
});

// router.get("/feed", function(req,res,next){
//   res.render("feed");
// })

// router.post("/upload", isLoggedIn, upload.single("file"), async function(req,res,next){
//   if(!req.file){
//     return res.status(404).send("no files are given");
//   }
//   const user = await userModel.findOne({username: req.session.passport.user});
//   const post = await postModel.create({
//     image: req.file.filename,
//     imageText : req.body.filecaption,
//     user: user._id
//   });
//   user.posts.push(post._id);
//   await user.save();
//   res.send("file uploaded successfully");
  
// })

router.get("/index", isLoggedIn, async function(req,res,next) {
  const user = await userModel.findOne({
    username: req.session.passport.user,
    });
  res.render("index",{user});
})

router.post("/register", function(req,res){

  // const userData = new userModel({
  //   username: req.body.username,
  //   email: req.body.email,
  //   fullName: req.body,fullname,
  // })

  //WRITING THESE FOUR LINES IN SHORT
  const{ username, email, fullname} = req.body;
  const userData = new userModel({username, email, fullname});

  userModel.register(userData, req.body.password)
  .then(function(){
    passport.authenticate("local")(req, res, function(){
      res.redirect("/");
    })
  })

})
router.post("/login", passport.authenticate("local",{
  successRedirect: "/index",
  failureRedirect: "/login" ,
  failureFlash: true
}), function(req, res){
});

router.get("/logout", function(req, res){
  req.logout(function(err){
    if(err) {
      return next(err);
    }
    res.redirect("/");
  });
})

function isLoggedIn(req, res, next){
  if(req.isAuthenticated())
    return next();
  res.redirect("/login");
}

module.exports = router;

