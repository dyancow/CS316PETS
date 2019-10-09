##CS316 Group Project: Adoptions Database

####By Saloni Bulchandani, Michelle Li, Charolton Lu, Dian Niu, and Tanisha Nalavadi
----- 
You can clone the working repository into your vm with 

```
git clone https://username@github.com/username/repository.git
```

Afterwards, please run the following installs:

```
sudo pip install flask
sudo pip install flask_sqlalchemy
sudo pip install flask_wtf
```

Then, in the root working directory for the cloned repository, run the following command to link the php with the flask front end.

```
sudo ln -s ./php-beers/ ./flask-beers/
```

Then, in the flask-beers repository, run the following command:

```
python app.py
```
Now, on your host browser, you should be able to access 
http://0.0.0.0:5000/
with what you need
