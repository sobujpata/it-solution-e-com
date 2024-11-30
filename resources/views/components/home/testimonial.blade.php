<div>

    <div class="container">

        <div class="testimonials-box">

            <!--- TESTIMONIALS-->

            <div class="testimonial">

                <h2 class="title">testimonial</h2>

                <span id="testimonialCard">

                </span>

                

            </div>



            <!--- CTA-->

            <div class="cta-container">

                <img src="{{ asset('images/laptop/rok1.jpg') }}" alt="summer collection" class="cta-banner">

                <a href="#" class="cta-content">

                    <p class="discount">25% Discount</p>

                    <h2 class="cta-title">Summer collection</h2>

                    <p class="cta-text">Starting @ $10</p>

                    <button class="cta-btn">Shop now</button>

                </a>

            </div>



            <!--- SERVICE-->

            <div class="service">

                <h2 class="title">Our Services</h2>

                <div class="service-container" id="services">

                </div>

            </div>

        </div>

    </div>

</div>

<script>
    getTestimonial()
    async function getTestimonial(){
        //Testimonial
        try {
            let resTestimonial = await axios.get("testimonial");
            console.log(resTestimonial)
            // Clear existing items
            document.getElementById("testimonialCard").innerHTML = '';

            let testimonialHTML = '';
            resTestimonial.data.forEach(function(item) {
            
            testimonialHTML += `
                       <div class="testimonial-card">

                    <img src="${item['image']}" alt="${item['name']}" class="testimonial-banner"
                        width="80" height="80">

                    <p class="testimonial-name">${item['name']}</p>

                    <p class="testimonial-title">${item['position']}</p>

                    <img src="${item['icon']}" alt="quotation" class="quotation-img"
                        width="26">

                    <p class="testimonial-desc">
                        ${item['testimonial']}
                    </p>

                </div>
                    `;
                });

            // Insert into DOM
            document.getElementById("testimonialCard").innerHTML = testimonialHTML;
            
        } catch (error) {
            console.error('Error loading Testimonial:', error);
        }
        try {
            let ressservices = await axios.get("services");
            console.log(ressservices)
            // Clear existing items
            document.getElementById("services").innerHTML = '';

            let sservicesHTML = '';
            ressservices.data.forEach(function(item) {
            
            sservicesHTML += `                       
                    <a href="#" class="service-item">

                        <div class="service-icon">
                            <ion-icon name="${item['icon']}"></ion-icon>
                        </div>

                        <div class="service-content">

                            <h3 class="service-title">${item['title']}</h3>
                            <p class="service-desc">${item['short_des']}</p>

                        </div>

                    </a>
                    `;
                });

            // Insert into DOM
            document.getElementById("services").innerHTML = sservicesHTML;
            
        } catch (error) {
            console.error('Error loading services:', error);
        }
    }
</script>