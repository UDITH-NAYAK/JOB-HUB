# import pickle
# import pandas as pd
# with open('model.pkl','rb') as f:
#     model=pickle.load(f)
# new_data = pd.DataFrame({'experience': [sys.argv[2]], 'test_score': [sys.argv[3]], 'interview_score': [sys.argv[4]]})
# print(model.predict(new_data))

import pickle
import pandas as pd
import sys

with open('model.pkl', 'rb') as f:
    model = pickle.load(f)

 
# Assuming sys.argv[1] is the experience, sys.argv[2] is the test_score, and sys.argv[3] is the interview_score
new_data = pd.DataFrame({'experience': [float(sys.argv[1])], 'test_score': [float(sys.argv[2])], 'interview_score': [float(sys.argv[3])]})
predicted_output = model.predict(new_data)

# Print the predicted output

print(predicted_output[0])
