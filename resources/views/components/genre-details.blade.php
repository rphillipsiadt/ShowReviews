@props(['name', 'description']) 
<div>
    
    <div class="border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300 max-w-xl mx-auto"> <!-- Limit the overall container width to make the component more compact --> 

        <!-- Genre Name --> 

        <h1 class="font-bold text-black-600 mb-2" style="font-size: 3rem;">{{ $name }}</h1> <!-- Heading with larger text and color --> 


        <!-- Genre Description -->
        
        <h2 class="text-black-600 mb-2" style="font-size: 2rem;">Description</h2>
        <h4 class="text-black-600 mb-2" style="font-size: 1rem;">{{ $description }}</h4>

    
    </div> 
</div>