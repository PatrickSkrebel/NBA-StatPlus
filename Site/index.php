<?php
include __DIR__ . '/../include/header.php'; 
?>

        <!-- Page content-->
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Post content-->
                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1">Today's Stats News</h1>
                            <!-- Post meta content-->
                            <!-- <div class="text-muted fst-italic mb-2">Posted on January 1, 2023 by Start Bootstrap</div> -->
                            <!-- Post categories
                            <a class="badge bg-secondary text-decoration-none link-light" href="#!">Web Design</a>
                            <a class="badge bg-secondary text-decoration-none link-light" href="#!">Freebies</a>
                            -->
                        </header>
                        <!-- Preview image figure-->
                        <figure class="mb-4"><img class="img-fluid rounded" src="https://www.inquirer.com/resizer/uoqT-oMeyFqN9RHap2JQM39U9KE=/760x507/smart/filters:format(webp)/cloudfront-us-east-1.images.arcpublishing.com/pmn/6R25ENZBGU5TYMD6NOMB6U7P3A.jpg" alt="..." /></figure>
                        <!-- Post content-->
                        <section class="mb-5">
                            <p class="fs-5 mb-4">Reigning MVP Joel Embiid suffered a lateral meniscus “injury” on his left knee and will be out at least through the weekend, the Philadelphia 76ers announced Thursday, placing the defense of his lofty title in jeopardy.</p>
                            <p class="fs-5 mb-4">Embiid is awaiting further testing to determine whether a tear of the meniscus occurred, and how severe the injury may be, according to sources close to the center.</p>
                            <p class="fs-5 mb-4">Embiid, who suffered the injury in the fourth quarter of a loss Tuesday against the Golden State Warriors, missed his 13th game Thursday against the Utah Jazz. Per a new league rule, any player who does not play in at least 65 of his team’s 82 regular-season games is ineligible for postseason awards. Embiid will be out for at least two more games, and if his absence extends any further, his MVP defense is over.</p>
                        <!-- extra lines
                            <h2 class="fw-bolder mb-4 mt-5">I have odd cosmic thoughts every day</h2>                        
                            <p class="fs-5 mb-4">For me, the most fascinating interface is Twitter. I have odd cosmic thoughts every day and I realized I could hold them to myself or share them with people who might be interested.</p>
                            <p class="fs-5 mb-4">Venus has a runaway greenhouse effect. I kind of want to know what happened there because we're twirling knobs here on Earth without knowing the consequences of it. Mars once had running water. It's bone dry today. Something bad happened there as well.</p>
                        -->
                        </section>
                    </article>
                    <!-- Comments section-->
                    <section class="mb-5">
                        <div class="card bg-light">
                            <div class="card-body">
                                <!-- Comment form-->
                                <form class="mb-4"><textarea class="form-control" rows="3" placeholder="Join the discussion and leave a comment!"></textarea></form>
                                <!-- Comment with nested comments-->
                                <div class="d-flex mb-4">
                                    <!-- Parent comment-->
                                    <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                    <div class="ms-3">
                                        <div class="fw-bold">LeBron James</div>
                                        Where are all the media outlets, tv media personalities, hot takes that talked so much 💩 about Joel Embiid about missing those games when he knew what he was dealing with.
                                        <!-- Child comment 1-->
                                        <div class="d-flex mt-4">
                                            <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                            <div class="ms-3">
                                                <div class="fw-bold">LeBron James</div>
                                                Now he’s out with an injury because of it. Not 1 person has went back on tv or their dumbass podcast and apologized to that MAN!! No accountability 🗑️🗑️🗑️
                                            </div>
                                        </div>
                                        <!-- Child comment 2-->
                                        <div class="d-flex mt-4">
                                            <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                            <div class="ms-3">
                                                <div class="fw-bold">Random Fan</div>
                                                Get in the gym buddy ur team is .500
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single comment-->
                                <div class="d-flex">
                                    <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                    <div class="ms-3">
                                        <div class="fw-bold">NBA on TNT</div>
                                        "I feel for the kid... He was the clear cut MVP for this year." 

                                        Shaq's reaction to Joel Embiid's meniscus injury
                                        <a href="https://twitter.com/i/status/1753218043482648758" target="_blank">Click to watch the video</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Search widget-->
                    <div class="card mb-4">
                        <div class="card-header">Search</div>
                        <div class="card-body">
                            <div class="input-group">
                                <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                                <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                            </div>
                        </div>
                    </div>
                    <!-- Categories widget-->
                    <div class="card mb-4">
                        <div class="card-header">Hot Topics 🔥</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="#!">MVP-Ladder</a></li>
                                        <li><a href="#!">All-Stars</a></li>
                                        <li><a href="#!">Rookie-Race</a></li>
                                    </ul>
                                </div>
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="#!">Free Agency</a></li>
                                        <li><a href="#!">BallIsLife</a></li>
                                        <li><a href="#!">Injuries</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Side widget-->
                    <div class="card mb-4">
                        <div class="card-header">Headlines</div>
                        <div class="card-body">
                            <div class="row">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="#!">Rivers to coach East in NBA All-Star Game</a></li>
                                    <hr>
                                    <li><a href="#!">Curry scores 60 with 10 3s in OT loss</a></li>
                                    <hr>
                                    <li><a href="#!">Full Focus: LeBron, Lakers snap Knicks' streak</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Side widget-->
                    <div class="card mb-4">
                        <div class="card-header">Side Widget</div>
                        <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Stat+ 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
