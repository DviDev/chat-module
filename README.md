# Chat Module
### Simple chat management
```mermaid
graph TD;
    Chat-->Groups;
    Chat-->Permissions;
    Chat-->Configs;
    Chat-->Participants;
    Chat-->Categories;
    Categories-->CategoriesParticipants[Participant];
    Categories-->Channels;
    Channels-->ChannelParticipants[Participants];
    Channels-->Topics;
    Topics-->TFiles[Files];
    Topics-->Messages;
    Messages-->MFiles[Files]
```

### Actions
```mermaid
graph TD;
    Chat-->ChatCreate[create];
    Chat-->ChatUpdate[update];
    Chat-->ChatDelete[del];
    Chat-->ChatParticipant[Participant];
    ChatParticipant-->ChatParticipantType[type];
    ChatParticipant-->ChatParticipantAdd[add];
    ChatParticipant-->ChatParticipantDel[del];
    Chat-->Category;
    Category-->CatParticipant[Participant];
    CatParticipant-->CatParticipantType[type];
    CatParticipant-->CatParticipantAdd[add];
    CatParticipant-->CatParticipantDel[del];
    Category-->CCreate[create];
    Category-->CUpdate[update];
    Category-->CDelete[del];
    Category-->Channel;
    Channel-->ChanParticipant[Participant];
    ChanParticipant-->ChanParticipantType[type];
    ChanParticipant-->ChanParticipantAdd[add];
    ChanParticipant-->ChanParticipantDel[del];
    Channel-->ChannelAdd[add];
    Channel-->ChannelUpdate[update];
    Channel-->ChannelDel[del];
    Channel-->Topic;
    Topic-->TopicAdd[add]
    Topic-->TopicUpdate[update]
    Topic-->TopicDel[del]
    Topic-->TopicFile[File];
    TopicFile-->FileAdd[add];
    TopicFile-->FileDel[del];
    Topic-->Message;
    Message-->MessageAdd[add];
    Message-->MessageUpdate[update];
    Message-->MessageDel[del];
    Message-->MessageFile[File];
    MessageFile-->MessageFileAdd[add];
    MessageFile-->MessageFileDel[del];
```
### Requirements
1. Chat
   1. Create
      1. Conditions
      2. Field validations
   2. Update
       1. Conditions
       2. Field validations
   3. Delete
       1. Conditions
       2. Field validations
       3. Participants
          1. Add
             1. Conditions
             2. Field validations
          2. Delete
             1. Conditions
             2. Field validations
          3. Type
             1. Conditions
             2. Field validations
       4. Categories
           4. Create
              1. Conditions
              2. Field validations
           5. Update
              1. Conditions
              2. Field validations
           6. Delete
              1. Conditions
              2. Field validations
           7. Participants
              1. Add
                 1. Conditions
                 2. Field validations
              2. Delete
                 1. Conditions
                 2. Field validations
              3. Type
                 1. Conditions
                 2. Field validations
           8. Channels
              1. Create
                 1. Conditions
                 2. Field validations
              2. Update
                 1. Conditions
                 2. Field validations
              3. Delete
                 1. Conditions
                 2. Field validations
              4. Topics
                 1. Create
                    1. Conditions
                    2. Field validations
                 2. Update
                    1. Conditions
                    2. Field validations
                 3. Delete
                    1. Conditions
                    2. Field validations
                 4. Files
                    1. Add
                       1. Conditions
                       2. Field validations
                    2. Delete
                       1. Conditions
                       2. Field validations
                 5. Messages
                    1. Create
                       1. Conditions
                       2. Field validations
                    2. Update
                       1. Conditions
                       2. Field validations
                    3. Delete
                       1. Conditions
                       2. Field validations
                    4. Files
                       1. Add
                          1. Conditions
                          2. Field validations
                       2. Delete
                          1. Conditinos
                          2. Field validations
