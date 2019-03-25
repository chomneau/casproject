@include('admin.student.print.header_style')
<body class="d-flex flex-column" style="min-height: 100vh">
	<main class="flex-fill">

		<page size="A4">

			<div class="container">
				<div class="row" >
		<!-- school info -->
				@include('admin.student.print.student_info')

		<!-- include grade 9 -->

				@include('admin.student.print.cgpa.transcript_by_grade_template.template_grade_9')

		<!-- include grade 10 -->
				@include('admin.student.print.cgpa.transcript_by_grade_template.template_grade_10')
				
		<!-- include cumulative template -->
				@include('admin.student.print.cgpa.transcript_by_grade_template.cumulative_template')		
			
				@include('admin.student.print.transcript_footer')
				</div>
				<!-- end row  -->
			</div>
			<!-- end container  -->
			
		</page>

<!-- <page size="A4" layout="portrait"></page> -->

	</main>


</body>
</html>




