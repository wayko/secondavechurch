(function(){
    //***************//
	//main app module//
	//***************//
	var app = angular.module('SACNYC',[]);
	//*********************//
	//navigation controller//
	//********************//
	app.controller('NavigationController', function(){
		this.navigations = navItems;
	});
	//****************//
	//navigation array//
	//****************//
	var navItems = [
		{
			name: "Home",
			location: "#top"
		},
		{
			name: "Visit",
			location: "#visit"
		},
		{
			name: "What We Believe",
			location: "#corevalues"
		},
		
		{
			name: "Contact Us",
			location: "#contactus"
		}
	];
	//****************************//
	//Level One Section controller//
	//****************************//
	app.controller('LevelOneController',function(){
		this.item = levelOne;
	});
	//***************//
	//level one items//
	//**************//
	var levelOne = {
	images: "img/IMG_8228.jpg",
	companyWelcome: "Welcome To DreamCPU." 
	}
	
	//****************************//
	//Level Two Section controller//
	//****************************//
	app.controller('LevelTwoController',function(){
		this.item = levelTwo;
	});
	//**********************//
	//level two array items//
	//********************//
var levelTwo =
{
	images: "img/IMG_8287.JPG"	
}

app.controller('LevelThreeController',function(){
		this.items = levelThree;
	});

var levelThree = [
{
	simpleTitle: "Lost People",
	fullTitle: "Lost people matter to God. He wants them found.",
	message: "In the formative years of our movement, the Holy Spirit instilled within A. B. Simpson a passion to reach people with no knowledge of Jesus Christ in his “Jerusalem” and around the world. That passion still lives within The Alliance today."
},
{
	simpleTitle: "Prayer",
	fullTitle: "Prayer is the primary work of God’s people.",
	message: "We believe that nothing of lasting value can be done unless it is bathed in prayer. So passionate was his belief that prayer undergirds all ministries, Alliance founder A. B. Simpson was compelled to create a prayer league to focus on the world’s evangelization. He believed that the Prayer Alliance would “prove to be the mightiest force in the spread of missions;” that force still drives The Alliance today."
},
{
	simpleTitle: "Stewardship",
	fullTitle: "Everything we have belongs to God. We are His stewards.",
	message: "This core value is intrinsic to the nature and structure of The Alliance—we teach and practice the blessing and effectiveness of the faith principle of giving as Scripture encourages us to remember that it’s not the amount of money we have or how much we give—it’s recognizing that everything we have comes from God (Luke 21:1–4)."
},
{
	simpleTitle: "God’s Word",
	fullTitle: "Knowing and obeying God’s Word is fundamental to all true success.",
	message: 'If The Alliance had a "life application" verse, it would be Matthew 28:19: Therefore go and make disciples of all nations, baptizing them in the name of the Father and of the Son and of the Holy Spirit—AKA The Great Commission! But the next verse is equally important: ". . . and teaching them to obey everything I have commanded you." '
},
{
	simpleTitle: "Great Commission",
	fullTitle: "Completing the Great Commission will require the mobilization of every fully devoted disciple.",
	message: "In The Christian and Missionary Alliance the first priority of every minister, congregation, and believer is to work for the evangelization of the world. Healthy churches producing healthy disciples devoted to reaching lost people—this is what will hasten the completion of the Great Commission and the return of Jesus Christ."
},
{
	simpleTitle: "Empowered",
	fullTitle: "Without the Holy Spirit’s empowerment, we can accomplish nothing.",
	message: "The Apostle Paul said, My message and my preaching were not with wise and persuasive words, but with a demonstration of the Spirit’s power, so that your faith might not rest on men’s wisdom, but on God’s power (1 Corinthians 2:4–5). This is the fiber of our being as believers and the sixth of our Alliance core values."
},
{
	simpleTitle: "Faith-Filled Risk",
	fullTitle: "Achieving God’s purposes means taking faith-filled risks. This always involves change.",
	message: 'For more than a century, Alliance workers have braved harsh and dangerous territory—often at great personal risk—to take the good news of Jesus to a lost world. These workers experienced this Alliance Core Value— "Achieving God’s purposes means taking faith-filled risks. This always involves change." Because of the selfless dedication of Alliance workers who were willing to lay down their lives for the gospel, entire people groups now know Jesus.'
}
];
app.controller('LevelFourController',function(){
		this.items = levelFour;
	});

var levelFour = [
{
	title: "test1",
	boxes: "boxes1"
	
},
{
	title: "test2",
	boxes: "boxes2"
}
];
})();