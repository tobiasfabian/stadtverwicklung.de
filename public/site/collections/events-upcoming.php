<?php
return function () {
	return collection('events')->filterBy('isUpcoming', '==', true);
};
