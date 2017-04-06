
# Song Thinger
Simple Song List App in PHP and MVC

This is based on PIP, a tiny application framework built for people who use a LAMP stack. PIP aims to be as simple as possible to set up and use.

Visit [http://gilbitron.github.com/PIP](http://gilbitron.github.com/PIP/) for more information and documentation.

## Why??

I needed to show someone conceptually how to build a simple MVC-style application. Unfortunately, I also needed to do it on a really old version of PHP. I also didn't want to get stuck in a pile of explaining more complicated frameworks like [CakePHP](https://cakephp.org/), [Symfony](https://symfony.com/), or [CodeIgniter](https://codeigniter.com/). 

Religious arguments aside, is this the best practice? No. But for teaching a few individuals some concepts they need to use ASAP, this will do just fine, thank you very much. These are folks just getting started in programming, and in the end, may not care. But if I can help them understand this, it may prove more valuable to them than just attempting to write straight PHP code for what they are doing.


## Installation and Usage

A couple things deviate from the core PIP framework:

1. Use the .htaccess-example file in the project root directory as the basis for creating your own .htaccess file. This is required, else the framework doesn't work
2. Use the config.example.php file as a basis for your own config.php file in the "application/config" folder.
3. There is a data folder in the project's root folder. You will need to import the song table into a database you have. It is outside the scope of this document to describe how to do this.

In the first two cases, these files are in .gitignore and will not automatically be saved to your repo if you are using Git. This is so you don't accidentally shoot yourself in the foot, save credentials in your repo, etc. If you deviate from this, you're on your own. (Well, you're on your own anyway, but you can't say I didn't warn you...)

For everything else, see the PIP website and walk through the code to get a basic understanding of how models, views, and controllers can be used in this simple environment: 

[http://gilbitron.github.com/PIP](http://gilbitron.github.com/PIP/) 




## License

Song Thinger is released under the MIT license, same as the underlying PIP framework. Have fun, but not too much fun!

