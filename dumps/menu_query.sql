SELECT food, foods.food_name, foods.fprice,foods.meal_type, foods.speciality, drink, drinks.drink_name, drinks.dprice, drinks.drink_type, drinks.speciality
FROM stamfordcafe.menu 
INNER JOIN foods ON food = foods.food_id
INNER JOIN drinks ON drink = drinks.drink_id;